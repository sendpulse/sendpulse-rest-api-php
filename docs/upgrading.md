# Upgrading from 2.x to 3.0

## Entry point

**Before:**
```php
$api = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());
$api->get('campaigns');
```

**After:**
```php
// OAuth
$client = new Sendpulse\RestApi\Client(clientId: $clientId, clientSecret: $clientSecret);

// or API key
$client = new Sendpulse\RestApi\Client(apiKey: $apiKey);

$client->emailService()->campaigns()->getCampaigns();
```

## Token storage

The old file-based token storage is replaced by `FileTokenStorage` (same behaviour, atomic writes, `0600` permissions). If you passed a custom `$tokenStoragePath`, use:

```php
$client = new Client(
    clientId:     $clientId,
    clientSecret: $clientSecret,
    cacheDir:     '/your/custom/path',
);
```

To use your own PSR-16 cache:
```php
$client = new Client(
    clientId:     $clientId,
    clientSecret: $clientSecret,
    tokenStorage: new Sendpulse\RestApi\Token\Psr16TokenStorage($yourPsr16Cache),
);
```

## HTTP client

To use your own PSR-18 HTTP client instead of the bundled cURL transport:

```php
$client = new Client(
    apiKey:     $apiKey,
    httpClient: new Sendpulse\RestApi\Http\Adapter\Psr18Adapter(
        $psrClient,
        $requestFactory,
        $streamFactory,
    ),
);
```

## Exceptions

| 2.x | 3.0 |
|-----|-----|
| `ApiClientException` | `Sendpulse\RestApi\Exception\AuthException` (401, 403) |
| `ApiClientException` | `Sendpulse\RestApi\Exception\RateLimitException` (429) |
| `ApiClientException` | `Sendpulse\RestApi\Exception\ApiException` (other 4xx, 5xx) |
| `ApiClientException` | `Sendpulse\RestApi\Exception\NetworkException` (transport / cURL failure) |
| `ApiClientException` | `Sendpulse\RestApi\Exception\ProtocolException` (invalid response format) |

`AuthException`, `RateLimitException`, and `ApiException` extend `SendPulseException` which carries `$httpStatus` and `$rawBody`. `NetworkException` and `ProtocolException` extend `\RuntimeException` directly.

## 2.x branch

The `2.x` branch remains open for critical security fixes only.
