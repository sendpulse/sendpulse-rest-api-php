# Laravel Integration

## Installation

```bash
composer require sendpulse/rest-api
```

## Configuration

Create `config/sendpulse.php`:

```php
return [
    'client_id'     => env('SENDPULSE_CLIENT_ID'),
    'client_secret' => env('SENDPULSE_CLIENT_SECRET'),
    // or API key auth:
    // 'api_key' => env('SENDPULSE_API_KEY'),
];
```

Add to `.env`:

```
SENDPULSE_CLIENT_ID=your-client-id
SENDPULSE_CLIENT_SECRET=your-client-secret
```

## Service Provider

Create `app/Providers/SendPulseServiceProvider.php`:

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Sendpulse\RestApi\Client;
use Sendpulse\RestApi\Token\Psr16TokenStorage;

class SendPulseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(Client::class, function ($app) {
            $config = $app['config']['sendpulse'];

            return new Client(
                clientId:     $config['client_id'] ?? null,
                clientSecret: $config['client_secret'] ?? null,
                apiKey:       $config['api_key'] ?? null,
                tokenStorage: new Psr16TokenStorage($app['cache.store']),
            );
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/sendpulse.php' => config_path('sendpulse.php'),
        ], 'sendpulse');
    }
}
```

Register in `bootstrap/providers.php` (Laravel 11+):

```php
return [
    App\Providers\SendPulseServiceProvider::class,
];
```

Or in `config/app.php` (Laravel 10 and below):

```php
'providers' => [
    App\Providers\SendPulseServiceProvider::class,
],
```

## Usage

Inject `Client` directly via constructor:

```php
use Sendpulse\RestApi\Client;

class CampaignController extends Controller
{
    public function __construct(private readonly Client $sendpulse) {}

    public function index()
    {
        $campaigns = $this->sendpulse->emailService()->campaigns()->getCampaigns(limit: 20);

        return view('campaigns.index', compact('campaigns'));
    }
}
```

Or resolve from the container:

```php
$client = app(Client::class);
$campaigns = $client->emailService()->campaigns()->getCampaigns();
```

## Token Storage

By default the SDK stores OAuth tokens in a temp file. With the Service Provider above, tokens are stored in **Laravel Cache** — whatever driver is configured (`redis`, `memcached`, `database`, etc.).

This is especially useful in multi-server or stateless environments where file-based tokens aren't shared between instances.

## PSR-18 HTTP Client (optional)

To route requests through Guzzle (useful for logging, retry middleware, etc.):

```bash
composer require guzzlehttp/guzzle
```

```php
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\HttpFactory;
use Sendpulse\RestApi\Client;
use Sendpulse\RestApi\Http\Adapter\Psr18Adapter;
use Sendpulse\RestApi\Token\Psr16TokenStorage;

$this->app->singleton(Client::class, function ($app) {
    $config   = $app['config']['sendpulse'];
    $factory  = new HttpFactory();

    return new Client(
        clientId:     $config['client_id'] ?? null,
        clientSecret: $config['client_secret'] ?? null,
        apiKey:       $config['api_key'] ?? null,
        tokenStorage: new Psr16TokenStorage($app['cache.store']),
        httpClient:   new Psr18Adapter(
            client:         new Guzzle(),
            requestFactory: $factory,
            streamFactory:  $factory,
        ),
    );
});
```

## Error Handling

```php
use Sendpulse\RestApi\Exception\ApiException;
use Sendpulse\RestApi\Exception\AuthException;
use Sendpulse\RestApi\Exception\NetworkException;
use Sendpulse\RestApi\Exception\ProtocolException;
use Sendpulse\RestApi\Exception\RateLimitException;

try {
    $result = $this->sendpulse->smtpService()->emails()->sendSmtpEmail($payload);
} catch (AuthException $e) {
    // 401 / 403 — check SENDPULSE_CLIENT_ID and SENDPULSE_CLIENT_SECRET
    report($e);
    abort(500, 'SendPulse authentication failed');
} catch (RateLimitException $e) {
    // 429 — consider queuing the request
    abort(429);
} catch (ApiException $e) {
    report($e);
    abort(500, 'SendPulse API error: ' . $e->httpStatus);
} catch (ProtocolException | NetworkException $e) {
    // malformed response or transport failure
    report($e);
    abort(500, 'SendPulse connection error');
}
```

## Queuing Sends

For high-volume or non-blocking email sending, dispatch a job:

```php
// app/Jobs/SendTransactionalEmail.php

use Illuminate\Contracts\Queue\ShouldQueue;
use Sendpulse\RestApi\Client;

class SendTransactionalEmail implements ShouldQueue
{
    public int $tries = 3;
    public int $backoff = 10;

    public function __construct(private readonly array $payload) {}

    public function handle(Client $sendpulse): void
    {
        $sendpulse->smtpService()->emails()->sendSmtpEmail($this->payload);
    }
}

// dispatch:
SendTransactionalEmail::dispatch($payload);
```
