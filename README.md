SendPulse REST client library
================

[![License](http://poser.pugx.org/sendpulse/rest-api/license)](https://packagist.org/packages/sendpulse/rest-api)
[![Total Downloads](http://poser.pugx.org/sendpulse/rest-api/downloads)](https://packagist.org/packages/sendpulse/rest-api)
[![PHP Version Require](http://poser.pugx.org/sendpulse/rest-api/require/php)](https://packagist.org/packages/sendpulse/rest-api)

Official PHP client for the [SendPulse REST API](https://sendpulse.com/integrations/api).

- PHP **≥ 8.3**, zero runtime dependencies (`ext-curl`, `ext-json`)
- PSR-18 HTTP client and PSR-16 cache adapters available as optional drop-ins
- Typed models generated from OpenAPI specs; thin ergonomic service layer on top
- PHPStan max · PSR-12 · 26 unit tests

### Requirements

- php: >=8.3
- ext-json: *
- ext-curl: *


### Installation

Via Composer:

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

Tokens are fetched automatically and stored on disk between requests.

## Services

| Method | Service |
|---|---|
| `$client->emailService()` | Bulk email campaigns and address books |
| `$client->smtpService()` | Transactional SMTP emails |
| `$client->smsService()` | SMS campaigns |
| `$client->crmService()` | CRM contacts and deals |
| `$client->chatbotService()` | Chatbot bots |

## Email service

```php
$email = $client->emailService();

// Campaigns
$campaigns = $email->campaigns()->getCampaigns(limit: 50);  // CampaignSummary[]
$campaign  = $email->campaigns()->getCampaignById(123);     // CampaignDetails

// Mailing lists
$lists = $email->mailingLists()->getMailingLists();         // array
$list  = $email->mailingLists()->getMailingListById(456);   // array

$email->mailingLists()->createMailingList(['name' => 'My list']);
$email->mailingLists()->updateMailingList(456, ['name' => 'Renamed']);
$email->mailingLists()->deleteMailingList(456);
```

## SMTP service

```php
$smtp = $client->smtpService();

$emails = $smtp->emails()->getSmtpEmails(limit: 100, offset: 0);  // EmailRecord[]
$email  = $smtp->emails()->getSmtpEmailInfo('message-id');         // EmailRecord

$smtp->emails()->sendSmtpEmail([
    'email' => [
        'html'    => '<h1>Hello</h1>',
        'text'    => 'Hello',
        'subject' => 'Test',
        'from'    => ['name' => 'Sender', 'email' => 'sender@example.com'],
        'to'      => [['name' => 'Recipient', 'email' => 'user@example.com']],
    ],
]);
```

## SMS service

```php
$sms = $client->smsService();

$campaigns = $sms->campaigns()->getSmsCampaigns();    // array
$campaign  = $sms->campaigns()->getSmsCampaignInfo(789); // array
```

## CRM service

```php
$crm = $client->crmService();

// Contacts
$contacts = $crm->contacts()->getContactsList();                                    // Contact[]
$contacts = $crm->contacts()->getContactListByEmail(['email' => 'alice@example.com']); // with filter
$contact  = $crm->contacts()->getContactById(1);                                   // array

// Deals
$deals = $crm->deals()->getDealsList();                          // array
$deals = $crm->deals()->getDealsList(['pipeline_id' => 5]);     // with filter
$deal  = $crm->deals()->getDeal(10);                            // array
```

## Chatbot service

```php
$bots = $client->chatbotService()->bots()->getBots();  // array
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
    $campaigns = $client->emailService()->campaigns()->getCampaigns();
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
| Upgrading from 1.x | [docs/upgrading.md](docs/upgrading.md) |


## License

MIT
