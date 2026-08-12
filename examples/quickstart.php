<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Sendpulse\RestApi\Client;
use Sendpulse\RestApi\Exception\ApiException;
use Sendpulse\RestApi\Exception\AuthException;
use Sendpulse\RestApi\Exception\NetworkException;
use Sendpulse\RestApi\Exception\ProtocolException;
use Sendpulse\RestApi\Exception\RateLimitException;

// ── OAuth (recommended for production) ───────────────────────────────────────
$client = new Client(
    clientId:     getenv('SENDPULSE_CLIENT_ID') ?: 'your-client-id',
    clientSecret: getenv('SENDPULSE_CLIENT_SECRET') ?: 'your-client-secret',
);

// ── or a static API key ───────────────────────────────────────────────────────
// $client = new Client(apiKey: getenv('SENDPULSE_API_KEY') ?: 'your-api-key');

// ── with custom token cache and timeouts ─────────────────────────────────────
// $client = new Client(
//     clientId:       'your-client-id',
//     clientSecret:   'your-client-secret',
//     cacheDir:       '/var/cache/sendpulse',
//     connectTimeout: 5,
//     requestTimeout: 15,
// );

// ── list campaigns ────────────────────────────────────────────────────────────
try {
    $campaigns = $client->emailService()->campaigns()->getCampaigns(limit: 10);

    echo 'Campaigns (' . count($campaigns) . '):' . PHP_EOL;

    foreach ($campaigns as $campaign) {
        echo '  [' . $campaign->id . '] ' . $campaign->name . PHP_EOL;
    }
} catch (AuthException $e) {
    // 401 or 403 — invalid key or token
    echo 'Auth error: ' . $e->getMessage() . PHP_EOL;
    exit(1);
} catch (RateLimitException $e) {
    // 429 — request rate limit exceeded (10 req/s)
    echo 'Rate limited — slow down' . PHP_EOL;
    exit(1);
} catch (ApiException $e) {
    // other 4xx / 5xx
    echo 'API error ' . $e->httpStatus . ': ' . $e->rawBody . PHP_EOL;
    exit(1);
} catch (ProtocolException $e) {
    // response received but could not be parsed (malformed JSON)
    echo 'Protocol error: ' . $e->getMessage() . PHP_EOL;
    exit(1);
} catch (NetworkException $e) {
    // network error or timeout
    echo 'Network error: ' . $e->getMessage() . PHP_EOL;
    exit(1);
}

// ── fetch a single campaign by ID ─────────────────────────────────────────────
// $campaign = $client->emailService()->campaigns()->getCampaignById(12345);
// echo $campaign->name;
