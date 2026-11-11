SendPulse REST client library
================

[![License](http://poser.pugx.org/sendpulse/rest-api/license)](https://packagist.org/packages/sendpulse/rest-api)
[![Total Downloads](http://poser.pugx.org/sendpulse/rest-api/downloads)](https://packagist.org/packages/sendpulse/rest-api)
[![PHP Version Require](http://poser.pugx.org/sendpulse/rest-api/require/php)](https://packagist.org/packages/sendpulse/rest-api)

Official PHP client for the [SendPulse REST API](https://sendpulse.com/integrations/api).

- PHP **≥ 8.3**, zero runtime dependencies (`ext-curl`, `ext-json`)
- Thin transport: OAuth / API-key auth, automatic token refresh, typed exceptions
- **Chained endpoint surface** with IDE autocomplete — `$client->crm->deals->getDeal([...])`
- Raw `get/post/...` fallback for any endpoint
- PSR-18 HTTP client and PSR-16 cache adapters available as optional drop-ins
- Ships `llms.txt` for AI coding assistants · PHPStan max · PSR-12

### Requirements

- php: >=8.3
- ext-json: *
- ext-curl: *

### Installation

```bash
composer require sendpulse/rest-api
```

## Quick start

### API key auth

```php
use Sendpulse\RestApi\Client;

$client = new Client(apiKey: 'YOUR_API_KEY');
```

### OAuth (client credentials)

```php
$client = new Client(
    clientId:     'YOUR_CLIENT_ID',
    clientSecret: 'YOUR_CLIENT_SECRET',
);
```

Tokens are fetched automatically and stored on disk between requests. A `401` is
retried once with a freshly minted token.

## Calling endpoints

### Chained surface

Mapped endpoints are reachable as a chain — `service → resource → operation` —
with IDE autocomplete for every segment and the parameter keys:

```php
$campaigns = $client->email->campaigns->getCampaigns(['limit' => 10]);
$campaign  = $client->email->campaigns->getCampaignById(['id' => 12345]);

$deal = $client->crm->deals->getDeal(['dealId' => 42]);

$client->smtp->emails->sendSmtpEmail([
    'email' => [
        'subject' => 'Hello',
        'from'    => ['name' => 'Me', 'email' => 'me@example.com'],
        'to'      => [['name' => 'You', 'email' => 'you@example.com']],
        'html'    => base64_encode('<p>Hi!</p>'),
    ],
]);
```

You pass **one associative array**. Path params (`{id}`) and declared query
params are routed automatically; **any other key goes to the JSON body** (for a
`GET` it becomes a query param). Every call returns the decoded JSON response as
an array (empty body → `[]`), or throws one of the exceptions below.

> **Hyphenated services** (`file-manager`, `live-chat`, `viber-chatbot`,
> `web-push`) cannot use the `->` arrow directly — wrap the service name in
> braces: `$client->{'file-manager'}->directory->getDirectoryTree([])`.

The full list of chains, paths and parameters lives in
[`resources/operations/`](resources/operations) and is mirrored in
[`llms.txt`](llms.txt).

### Raw requests

For any endpoint not in the map — or when you want full control — call a path
directly:

```php
$client->get('/campaigns', ['limit' => 10]);          // also query params
$client->post('/smtp/emails', ['email' => [/* ... */]]); // put / patch / delete too

// lowest level:
$client->request('GET', '/campaigns');
$client->send(new \Sendpulse\RestApi\Http\Request(method: 'GET', uri: '/campaigns'));
```

## IDE autocomplete

The chained surface is powered by generated stub definitions in
[`resources/ide/stubs.php`](resources/ide/stubs.php):

- **PhpStorm / VS Code** index them automatically — no setup.
- **PHPStan** users: register them (they add no runtime cost) —

  ```neon
  parameters:
      scanFiles:
          - vendor/sendpulse/rest-api/resources/ide/stubs.php
  ```

## Error handling

```php
use Sendpulse\RestApi\Exception\AuthException;
use Sendpulse\RestApi\Exception\ForbiddenException;
use Sendpulse\RestApi\Exception\RateLimitException;
use Sendpulse\RestApi\Exception\ApiException;
use Sendpulse\RestApi\Exception\NetworkException;
use Sendpulse\RestApi\Exception\ProtocolException;

try {
    $campaigns = $client->email->campaigns->getCampaigns();
} catch (AuthException $e) {
    // 401 — invalid or expired credentials
} catch (ForbiddenException $e) {
    // 403 — tariff or permission restriction
} catch (RateLimitException $e) {
    // 429 — back off and retry
} catch (ApiException $e) {
    echo $e->httpStatus; // other 4xx / 5xx
    echo $e->rawBody;
} catch (ProtocolException $e) {
    // response received but could not be parsed (malformed JSON from API)
} catch (NetworkException $e) {
    // curl / transport error
}
```

All six implement `Sendpulse\RestApi\Exception\SendPulseExceptionInterface`, so a
single `catch (SendPulseExceptionInterface $e)` covers every SDK error.

## Configuration

```php
$client = new Client(
    apiKey:         'key',
    connectTimeout: 10,   // seconds, default
    requestTimeout: 30,   // seconds, default
);
```

## Custom HTTP client (PSR-18)

```php
use Sendpulse\RestApi\Http\Adapter\Psr18Adapter;

$client = new Client(
    apiKey:     'key',
    httpClient: new Psr18Adapter(
        client:         $yourPsr18Client,
        requestFactory: $requestFactory,
        streamFactory:  $streamFactory,
    ),
);
```

## Custom token storage

```php
use Sendpulse\RestApi\Token\Psr16TokenStorage;
use Sendpulse\RestApi\Token\InMemoryTokenStorage;

// PSR-16 cache (e.g. Symfony Cache, Laravel Cache)
$storage = new Psr16TokenStorage($psr16Cache);

// In-memory (tokens lost on process exit)
$storage = new InMemoryTokenStorage();

$client = new Client(
    clientId:     'id',
    clientSecret: 'secret',
    tokenStorage: $storage,
);
```

Default is `FileTokenStorage` (system temp directory or custom `cacheDir`).

## Documentation

| Topic | |
|---|---|
| Authentication & token storage | [docs/authentication.md](docs/authentication.md) |
| Exception reference | [docs/exceptions.md](docs/exceptions.md) |
| Testing | [docs/testing.md](docs/testing.md) |
| Laravel integration | [docs/laravel.md](docs/laravel.md) |
| Upgrading | [docs/upgrading.md](docs/upgrading.md) |
| AI assistants | [llms.txt](llms.txt) |

## License

MIT
