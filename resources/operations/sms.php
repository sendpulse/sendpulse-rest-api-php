<?php

declare(strict_types=1);

/**
 * Operation map fragment for "sms" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 18 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'sms.campaigns.calculateSmsCost' => [
        'method' => 'GET',
        'path'   => '/sms/campaigns/cost',
        'params' => ['addressBookId' => 'int', 'phones' => 'array', 'body' => 'string!', 'sender' => 'string!', 'route' => 'mixed'],
    ],
    'sms.campaigns.cancelSmsCampaign' => [
        'method' => 'PUT',
        'path'   => '/sms/campaigns/cancel/{id}',
        'params' => ['id' => 'int!'],
    ],
    'sms.campaigns.createSmsCampaign' => [
        'method' => 'POST',
        'path'   => '/sms/campaigns',
        'params' => [],
    ],
    'sms.campaigns.deleteSmsCampaign' => [
        'method' => 'DELETE',
        'path'   => '/sms/campaigns',
        'params' => [],
    ],
    'sms.campaigns.getSmsCampaignInfo' => [
        'method' => 'GET',
        'path'   => '/sms/campaigns/info/{id}',
        'params' => ['id' => 'int!'],
    ],
    'sms.campaigns.getSmsCampaigns' => [
        'method' => 'GET',
        'path'   => '/sms/campaigns/list',
        'params' => ['dateFrom' => 'string', 'dateTo' => 'string'],
    ],
    'sms.campaigns.sendSmsToNumbers' => [
        'method' => 'POST',
        'path'   => '/sms/send',
        'params' => [],
    ],
    'sms.compliance.addSmsBlacklist' => [
        'method' => 'POST',
        'path'   => '/sms/black_list',
        'params' => [],
    ],
    'sms.compliance.getSmsBlacklist' => [
        'method' => 'GET',
        'path'   => '/sms/black_list',
        'params' => [],
    ],
    'sms.compliance.removeSmsBlacklist' => [
        'method' => 'DELETE',
        'path'   => '/sms/black_list',
        'params' => [],
    ],
    'sms.configuration.getSmsSenders' => [
        'method' => 'GET',
        'path'   => '/sms/senders',
        'params' => [],
    ],
    'sms.contacts.addSmsNumbers' => [
        'method' => 'POST',
        'path'   => '/sms/numbers',
        'params' => [],
    ],
    'sms.contacts.addSmsNumbersWithVariables' => [
        'method' => 'POST',
        'path'   => '/sms/numbers/variables',
        'params' => [],
    ],
    'sms.contacts.getSmsNumberInfo' => [
        'method' => 'GET',
        'path'   => '/sms/numbers/info/{addressBookId}/{phoneNumber}',
        'params' => ['addressBookId' => 'int!', 'phoneNumber' => 'string!'],
    ],
    'sms.contacts.removeSmsNumbers' => [
        'method' => 'DELETE',
        'path'   => '/sms/numbers',
        'params' => [],
    ],
    'sms.contacts.updateContactPhone' => [
        'method' => 'PUT',
        'path'   => '/addressbooks/{id}/phone',
        'params' => ['id' => 'int!'],
    ],
    'sms.contacts.updateSmsVariablesBatch' => [
        'method' => 'PUT',
        'path'   => '/sms/numbers',
        'params' => [],
    ],
    'sms.contacts.updateSmsVariablesSingle' => [
        'method' => 'POST',
        'path'   => '/addressbooks/{id}/phones/variable',
        'params' => ['id' => 'int!'],
    ],
];
