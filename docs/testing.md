# Testing

## Testing your own code that uses the SDK

The recommended approach is to **not mock `Client` at all** — instead, substitute the HTTP transport layer with a fake. This way your tests exercise real SDK logic (request building, response parsing, model hydration) without making network calls.

### FakeHttpClient

The SDK ships `FakeHttpClient` in the `tests/Fixture/` directory. It implements `HttpClient` and lets you queue pre-built responses:

```php
use Sendpulse\RestApi\Http\Response;
use Sendpulse\RestApi\Tests\Fixture\FakeHttpClient;

$fake = new FakeHttpClient();

$fake->queue(new Response(200, [], json_encode([
    ['id' => 1, 'name' => 'Newsletter'],
    ['id' => 2, 'name' => 'Promo'],
])));
```

Pass it to `Client` via the `httpClient` argument:

```php
use Sendpulse\RestApi\Client;

$client = new Client(
    apiKey:     'test-key',
    httpClient: $fake,
);
```

Now `$client` makes no real HTTP calls — every `send()` returns the next queued response.

### Full example

```php
use PHPUnit\Framework\TestCase;
use Sendpulse\RestApi\Client;
use Sendpulse\RestApi\Http\Response;
use Sendpulse\RestApi\Tests\Fixture\FakeHttpClient;

final class CampaignServiceTest extends TestCase
{
    private FakeHttpClient $http;
    private Client $client;

    protected function setUp(): void
    {
        $this->http   = new FakeHttpClient();
        $this->client = new Client(apiKey: 'test', httpClient: $this->http);
    }

    public function testGetCampaignsReturnsMappedModels(): void
    {
        $this->http->queue(new Response(200, [], json_encode([
            ['id' => 42, 'name' => 'Black Friday'],
        ])));

        $campaigns = $this->client->emailService()->campaigns()->getCampaigns();

        self::assertCount(1, $campaigns);
        self::assertSame(42, $campaigns[0]->id);
        self::assertSame('Black Friday', $campaigns[0]->name);
    }

    public function testGetCampaignsBuildsCorrectRequest(): void
    {
        $this->http->queue(new Response(200, [], '[]'));

        $this->client->emailService()->campaigns()->getCampaigns(limit: 50, offset: 10);

        $request = $this->http->lastRequest();
        self::assertStringContainsString('limit=50', $request->uri);
        self::assertStringContainsString('offset=10', $request->uri);
    }
}
```

### FakeHttpClient API

| Method | Description |
|---|---|
| `queue(Response ...$responses)` | Enqueue one or more responses to return in order |
| `lastRequest(): Request` | Returns the most recently sent request |
| `allRequests(): Request[]` | Returns all requests sent so far |
| `callCount(): int` | Number of HTTP calls made |

---

## Testing error handling

Queue an error response to verify your catch blocks:

```php
use Sendpulse\RestApi\Exception\AuthException;

public function testHandlesAuthError(): void
{
    $this->http->queue(new Response(401, [], '{"error":"Unauthorized"}'));

    $this->expectException(AuthException::class);

    $this->client->emailService()->campaigns()->getCampaigns();
}
```

```php
use Sendpulse\RestApi\Exception\RateLimitException;

public function testHandlesRateLimit(): void
{
    $this->http->queue(new Response(429, [], '{"error":"Too Many Requests"}'));

    $this->expectException(RateLimitException::class);

    $this->client->smtpService()->emails()->sendSmtpEmail([]);
}
```

---

## Mocking Client in Laravel / frameworks

If you need to substitute `Client` in a framework container (e.g., to test a controller), bind a pre-configured instance in your test:

```php
// Laravel example
protected function setUp(): void
{
    parent::setUp();

    $fake   = new FakeHttpClient();
    $client = new Client(apiKey: 'test', httpClient: $fake);

    $this->app->instance(Client::class, $client);

    // store $fake on the test for later assertions
    $this->fakeHttp = $fake;
}

public function testCampaignIndex(): void
{
    $this->fakeHttp->queue(new Response(200, [], json_encode([
        ['id' => 1, 'name' => 'Test'],
    ])));

    $response = $this->get('/campaigns');

    $response->assertOk();
    $response->assertSee('Test');
}
```

---

## Token storage in tests

Use `InMemoryTokenStorage` to avoid file I/O and keep tests isolated:

```php
use Sendpulse\RestApi\Token\InMemoryTokenStorage;

$client = new Client(
    clientId:     'test-id',
    clientSecret: 'test-secret',
    httpClient:   $fake,
    tokenStorage: new InMemoryTokenStorage(),
);
```
