# Exception Reference

All SDK exceptions extend `\RuntimeException` and are thrown only — never swallowed internally.

## Hierarchy

```
\RuntimeException
├── Sendpulse\RestApi\Exception\SendPulseException  (abstract)
│   ├── AuthException       — 401, 403
│   ├── RateLimitException  — 429
│   └── ApiException        — other 4xx, 5xx
├── NetworkException        — transport / cURL failure
└── ProtocolException       — response received but cannot be parsed
```

`SendPulseException` carries two public properties:

```php
$e->httpStatus;  // int  — HTTP status code
$e->rawBody;     // string — raw response body
```

`NetworkException` and `ProtocolException` do not have these — they occur before or outside of a valid HTTP exchange.

---

## AuthException

**When:** API returns `401` or `403`.

**Causes:**
- Invalid or expired API key
- Invalid OAuth credentials (`clientId` / `clientSecret`)
- Insufficient permissions for the requested resource

**What to do:** check your credentials. For OAuth, the SDK automatically retries once with a fresh token on `401` before throwing — so if you see this exception, the refresh also failed.

```php
} catch (AuthException $e) {
    echo $e->httpStatus; // 401 or 403
    echo $e->rawBody;    // {"error": "..."}
}
```

---

## RateLimitException

**When:** API returns `429`.

**Causes:** exceeded the request rate limit (SendPulse allows up to 10 requests per second).

**What to do:** back off and retry. Consider queuing high-volume operations.

```php
} catch (RateLimitException $e) {
    sleep(1);
    // retry or dispatch to queue
}
```

---

## ApiException

**When:** API returns any other `4xx` or `5xx` response.

**Causes:**
- `400` — malformed request body
- `404` — resource not found
- `422` — validation error
- `500` — internal server error on SendPulse side

```php
} catch (ApiException $e) {
    echo $e->httpStatus; // e.g. 422
    echo $e->rawBody;    // {"message": "The email field is required."}
}
```

---

## NetworkException

**When:** the HTTP request could not be completed at the transport level.

**Causes:**
- DNS resolution failure
- Connection refused or timed out
- SSL/TLS handshake error
- cURL initialisation failure

No HTTP response was received. Retrying after a delay is often appropriate.

```php
} catch (NetworkException $e) {
    echo $e->getMessage(); // "cURL error (6): Could not resolve host"
}
```

---

## ProtocolException

**When:** a response was received but could not be parsed.

**Causes:**
- API returned malformed JSON (e.g. during a server-side incident)
- OAuth token endpoint returned an unexpected response shape

Unlike `NetworkException`, the network itself worked. Retrying is unlikely to help until the API-side issue is resolved.

```php
} catch (ProtocolException $e) {
    echo $e->getMessage(); // "Failed to decode response body: Syntax error"
}
```

---

## Recommended catch order

Catch from most specific to least specific:

```php
use Sendpulse\RestApi\Exception\AuthException;
use Sendpulse\RestApi\Exception\RateLimitException;
use Sendpulse\RestApi\Exception\ApiException;
use Sendpulse\RestApi\Exception\ProtocolException;
use Sendpulse\RestApi\Exception\NetworkException;

try {
    $result = $client->smtpService()->emails()->sendSmtpEmail($payload);
} catch (AuthException $e) {
    // credentials problem — do not retry
} catch (RateLimitException $e) {
    // slow down — retry after delay
} catch (ApiException $e) {
    // API rejected the request — log and inspect $e->rawBody
} catch (ProtocolException $e) {
    // unexpected response format — log and alert
} catch (NetworkException $e) {
    // transport failure — retry after delay
}
```

To catch any SDK exception in one block:

```php
use Sendpulse\RestApi\Exception\SendPulseException;

try {
    // ...
} catch (SendPulseException $e) {
    // covers AuthException, RateLimitException, ApiException
    log_error($e->httpStatus, $e->rawBody);
} catch (\RuntimeException $e) {
    // covers NetworkException and ProtocolException
    log_error($e->getMessage());
}
```
