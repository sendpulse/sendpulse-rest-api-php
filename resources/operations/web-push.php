<?php

declare(strict_types=1);

/**
 * Operation map fragment for "web-push" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 11 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'web-push.campaigns.createWebPushCampaign' => [
        'method' => 'POST',
        'path'   => '/push/tasks',
        'params' => [],
    ],
    'web-push.campaigns.getWebPushCampaignStats' => [
        'method' => 'GET',
        'path'   => '/push/tasks/{id}',
        'params' => ['id' => 'int!'],
    ],
    'web-push.campaigns.getWebPushCampaigns' => [
        'method' => 'GET',
        'path'   => '/push/tasks',
        'params' => ['limit' => 'int', 'offset' => 'int', 'from' => 'string', 'to' => 'string', 'website_id' => 'int'],
    ],
    'web-push.configuration.getWebPushCode' => [
        'method' => 'GET',
        'path'   => '/push/websites/{id}/code',
        'params' => ['id' => 'int!'],
    ],
    'web-push.subscribers.getWebPushSubscribersTotal' => [
        'method' => 'GET',
        'path'   => '/push/websites/{id}/subscriptions/total',
        'params' => ['id' => 'int!'],
    ],
    'web-push.subscribers.getWebPushSubscriptions' => [
        'method' => 'GET',
        'path'   => '/push/websites/{id}/subscriptions',
        'params' => ['id' => 'int!', 'limit' => 'int', 'offset' => 'int', 'subscription_date_from' => 'string', 'subscription_date_to' => 'string'],
    ],
    'web-push.subscribers.setWebPushSubscriberState' => [
        'method' => 'POST',
        'path'   => '/push/subscriptions/state',
        'params' => [],
    ],
    'web-push.websites.getWebPushVariables' => [
        'method' => 'GET',
        'path'   => '/push/websites/{id}/variables',
        'params' => ['id' => 'int!'],
    ],
    'web-push.websites.getWebPushWebsiteInfo' => [
        'method' => 'GET',
        'path'   => '/push/websites/info/{id}',
        'params' => ['id' => 'int!'],
    ],
    'web-push.websites.getWebPushWebsites' => [
        'method' => 'GET',
        'path'   => '/push/websites',
        'params' => ['limit' => 'int', 'offset' => 'int'],
    ],
    'web-push.websites.getWebPushWebsitesTotal' => [
        'method' => 'GET',
        'path'   => '/push/websites/total',
        'params' => [],
    ],
];
