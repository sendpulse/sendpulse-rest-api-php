<?php

declare(strict_types=1);

/**
 * Operation map fragment for "tiktok" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 39 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'tiktok.account.getAccount' => [
        'method' => 'GET',
        'path'   => '/tiktok/account',
        'params' => [],
    ],
    'tiktok.bots.getBotStatistics' => [
        'method' => 'GET',
        'path'   => '/tiktok/bots/statistics',
        'params' => ['bot_id' => 'string!'],
    ],
    'tiktok.bots.getBots' => [
        'method' => 'GET',
        'path'   => '/tiktok/bots',
        'params' => [],
    ],
    'tiktok.campaigns.getCampaignRecipients' => [
        'method' => 'GET',
        'path'   => '/tiktok/campaigns/recipients',
        'params' => ['id' => 'string!'],
    ],
    'tiktok.campaigns.getCampaignReport' => [
        'method' => 'GET',
        'path'   => '/tiktok/campaigns/report',
        'params' => ['id' => 'string!'],
    ],
    'tiktok.campaigns.sendCampaign' => [
        'method' => 'POST',
        'path'   => '/tiktok/campaigns/send',
        'params' => [],
    ],
    'tiktok.chats.getChatMessages' => [
        'method' => 'GET',
        'path'   => '/tiktok/chats/messages',
        'params' => ['contact_id' => 'string!'],
    ],
    'tiktok.chats.getChats' => [
        'method' => 'GET',
        'path'   => '/tiktok/chats',
        'params' => ['bot_id' => 'string'],
    ],
    'tiktok.contacts.assignContactOperator' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/operators/assign',
        'params' => [],
    ],
    'tiktok.contacts.assignContactOperatorGroup' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/operators/assignGroup',
        'params' => [],
    ],
    'tiktok.contacts.closeContactChat' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/closeChat',
        'params' => [],
    ],
    'tiktok.contacts.createContactNote' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/createNote',
        'params' => [],
    ],
    'tiktok.contacts.deleteContact' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/delete',
        'params' => [],
    ],
    'tiktok.contacts.deleteContactNote' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/deleteNote',
        'params' => [],
    ],
    'tiktok.contacts.deleteContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/deletePauseAutomation',
        'params' => [],
    ],
    'tiktok.contacts.deleteContactTag' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/deleteTag',
        'params' => [],
    ],
    'tiktok.contacts.deleteContactVariable' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/deleteVariable',
        'params' => [],
    ],
    'tiktok.contacts.disableContact' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/disable',
        'params' => [],
    ],
    'tiktok.contacts.enableContact' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/enable',
        'params' => [],
    ],
    'tiktok.contacts.getContact' => [
        'method' => 'GET',
        'path'   => '/tiktok/contacts/get',
        'params' => ['id' => 'string!'],
    ],
    'tiktok.contacts.getContactNotes' => [
        'method' => 'GET',
        'path'   => '/tiktok/contacts/notes',
        'params' => ['bot_id' => 'string!', 'contact_id' => 'string!'],
    ],
    'tiktok.contacts.getContactPauseAutomation' => [
        'method' => 'GET',
        'path'   => '/tiktok/contacts/getPauseAutomation',
        'params' => ['contact_id' => 'string!'],
    ],
    'tiktok.contacts.getContactsByTag' => [
        'method' => 'GET',
        'path'   => '/tiktok/contacts/getByTag',
        'params' => ['tag' => 'string!', 'bot_id' => 'string!'],
    ],
    'tiktok.contacts.getContactsByVariable' => [
        'method' => 'GET',
        'path'   => '/tiktok/contacts/getByVariable',
        'params' => ['variable_id' => 'string', 'variable_name' => 'string', 'bot_id' => 'string', 'variable_value' => 'string!'],
    ],
    'tiktok.contacts.markContactMessagesRead' => [
        'method' => 'PUT',
        'path'   => '/tiktok/contacts/mark-read',
        'params' => ['contact_id' => 'string!'],
    ],
    'tiktok.contacts.markContactMessagesUnread' => [
        'method' => 'PUT',
        'path'   => '/tiktok/contacts/mark-unread',
        'params' => ['contact_id' => 'string!'],
    ],
    'tiktok.contacts.openContactChat' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/openChat',
        'params' => [],
    ],
    'tiktok.contacts.sendMessages' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/send',
        'params' => [],
    ],
    'tiktok.contacts.setContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/setPauseAutomation',
        'params' => [],
    ],
    'tiktok.contacts.setContactTags' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/setTag',
        'params' => [],
    ],
    'tiktok.contacts.setContactVariable' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/setVariable',
        'params' => [],
    ],
    'tiktok.contacts.unassignContactOperator' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/operators/unAssign',
        'params' => [],
    ],
    'tiktok.contacts.updateContactNote' => [
        'method' => 'POST',
        'path'   => '/tiktok/contacts/updateNote',
        'params' => [],
    ],
    'tiktok.flows.getFlows' => [
        'method' => 'GET',
        'path'   => '/tiktok/flows',
        'params' => ['bot_id' => 'string!'],
    ],
    'tiktok.flows.runFlow' => [
        'method' => 'POST',
        'path'   => '/tiktok/flows/run',
        'params' => [],
    ],
    'tiktok.flows.runFlowByTrigger' => [
        'method' => 'POST',
        'path'   => '/tiktok/flows/runByTrigger',
        'params' => [],
    ],
    'tiktok.tags.getTags' => [
        'method' => 'GET',
        'path'   => '/tiktok/tags',
        'params' => ['bot_id' => 'string!'],
    ],
    'tiktok.triggers.getTriggers' => [
        'method' => 'GET',
        'path'   => '/tiktok/triggers',
        'params' => ['bot_id' => 'string!'],
    ],
    'tiktok.variables.getVariables' => [
        'method' => 'GET',
        'path'   => '/tiktok/variables',
        'params' => ['bot_id' => 'string!'],
    ],
];
