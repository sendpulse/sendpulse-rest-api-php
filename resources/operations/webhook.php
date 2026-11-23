<?php

declare(strict_types=1);

/**
 * Operation map fragment for "webhook" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 15 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'webhook.actions.getActionEvents' => [
        'method' => 'GET',
        'path'   => '/actions/events',
        'params' => [],
    ],
    'webhook.actions.getActions' => [
        'method' => 'GET',
        'path'   => '/actions',
        'params' => ['scope' => 'string', 'event' => 'string', 'order' => 'string', 'order_by' => 'string'],
    ],
    'webhook.actions.getPaymentOrderStatuses' => [
        'method' => 'GET',
        'path'   => '/actions/payment-order-statuses',
        'params' => [],
    ],
    'webhook.webhooks.addWebhookEvent' => [
        'method' => 'POST',
        'path'   => '/webhooks/{webhook}/events/{action}',
        'params' => ['webhook' => 'string!', 'action' => 'string!'],
    ],
    'webhook.webhooks.createWebhook' => [
        'method' => 'POST',
        'path'   => '/webhooks',
        'params' => [],
    ],
    'webhook.webhooks.deleteWebhook' => [
        'method' => 'DELETE',
        'path'   => '/webhooks/{webhook}',
        'params' => ['webhook' => 'string!'],
    ],
    'webhook.webhooks.getWebhookById' => [
        'method' => 'GET',
        'path'   => '/webhooks/{webhook}',
        'params' => ['webhook' => 'string!'],
    ],
    'webhook.webhooks.getWebhookLogs' => [
        'method' => 'GET',
        'path'   => '/webhooks/{webhook}/logs',
        'params' => ['limit' => 'int', 'cursor' => 'mixed', 'webhook' => 'string!'],
    ],
    'webhook.webhooks.getWebhooks' => [
        'method' => 'GET',
        'path'   => '/webhooks',
        'params' => ['status' => 'int', 'search' => 'string', 'order' => 'string', 'order_by' => 'string'],
    ],
    'webhook.webhooks.regenerateWebhookSecret' => [
        'method' => 'POST',
        'path'   => '/webhooks/{webhook}/secret',
        'params' => ['webhook' => 'string!'],
    ],
    'webhook.webhooks.removeWebhookEvent' => [
        'method' => 'DELETE',
        'path'   => '/webhooks/{webhook}/events/{action}',
        'params' => ['webhook' => 'string!', 'action' => 'string!'],
    ],
    'webhook.webhooks.retryWebhookDelivery' => [
        'method' => 'POST',
        'path'   => '/webhooks/{webhook}/logs/retry',
        'params' => ['webhook' => 'string!'],
    ],
    'webhook.webhooks.testWebhook' => [
        'method' => 'POST',
        'path'   => '/webhooks/{webhook}/test',
        'params' => ['webhook' => 'string!'],
    ],
    'webhook.webhooks.updateWebhook' => [
        'method' => 'POST',
        'path'   => '/webhooks/{webhook}',
        'params' => ['webhook' => 'string!'],
    ],
    'webhook.webhooks.updateWebhookStatus' => [
        'method' => 'POST',
        'path'   => '/webhooks/{webhook}/status',
        'params' => ['webhook' => 'string!'],
    ],
];
