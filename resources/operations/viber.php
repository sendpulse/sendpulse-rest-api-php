<?php

declare(strict_types=1);

/**
 * Operation map fragment for "viber" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 9 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'viber.campaigns.createViberCampaign' => [
        'method' => 'POST',
        'path'   => '/viber',
        'params' => [],
    ],
    'viber.campaigns.getViberCampaignStats' => [
        'method' => 'GET',
        'path'   => '/viber/task/{id}',
        'params' => ['id' => 'int!'],
    ],
    'viber.campaigns.getViberCampaigns' => [
        'method' => 'GET',
        'path'   => '/viber/task',
        'params' => ['limit' => 'int', 'offset' => 'int'],
    ],
    'viber.campaigns.getViberRecipients' => [
        'method' => 'GET',
        'path'   => '/viber/task/{id}/recipients',
        'params' => ['id' => 'int!'],
    ],
    'viber.compliance.addViberBlacklist' => [
        'method' => 'POST',
        'path'   => '/v2/viber-service/phone-exception',
        'params' => [],
    ],
    'viber.compliance.getViberBlacklist' => [
        'method' => 'GET',
        'path'   => '/v2/viber-service/phone-exception',
        'params' => ['limit' => 'int', 'offset' => 'int'],
    ],
    'viber.compliance.removeViberBlacklist' => [
        'method' => 'DELETE',
        'path'   => '/v2/viber-service/phone-exception',
        'params' => [],
    ],
    'viber.configuration.getViberSenderProfile' => [
        'method' => 'GET',
        'path'   => '/viber/senders/{id}',
        'params' => ['id' => 'int!'],
    ],
    'viber.configuration.getViberSenders' => [
        'method' => 'GET',
        'path'   => '/viber/senders',
        'params' => [],
    ],
];
