<?php

declare(strict_types=1);

/**
 * Operation map fragment for "telegram" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 43 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'telegram.account.getAccount' => [
        'method' => 'GET',
        'path'   => '/telegram/account',
        'params' => [],
    ],
    'telegram.bots.getBotStatistics' => [
        'method' => 'GET',
        'path'   => '/telegram/bots/statistics',
        'params' => ['bot_id' => 'string!'],
    ],
    'telegram.bots.getBots' => [
        'method' => 'GET',
        'path'   => '/telegram/bots',
        'params' => [],
    ],
    'telegram.campaigns.getCampaignRecipients' => [
        'method' => 'GET',
        'path'   => '/telegram/campaigns/recipients',
        'params' => ['id' => 'string!'],
    ],
    'telegram.campaigns.getCampaignReport' => [
        'method' => 'GET',
        'path'   => '/telegram/campaigns/report',
        'params' => ['id' => 'string!'],
    ],
    'telegram.campaigns.sendCampaign' => [
        'method' => 'POST',
        'path'   => '/telegram/campaigns/send',
        'params' => [],
    ],
    'telegram.chats.getChatMessages' => [
        'method' => 'GET',
        'path'   => '/telegram/chats/messages',
        'params' => ['contact_id' => 'string!'],
    ],
    'telegram.chats.getChats' => [
        'method' => 'GET',
        'path'   => '/telegram/chats',
        'params' => ['bot_id' => 'string'],
    ],
    'telegram.contacts.assignContactOperator' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/operators/assign',
        'params' => [],
    ],
    'telegram.contacts.assignContactOperatorGroup' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/operators/assignGroup',
        'params' => [],
    ],
    'telegram.contacts.closeContactChat' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/closeChat',
        'params' => [],
    ],
    'telegram.contacts.createContact' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts',
        'params' => [],
    ],
    'telegram.contacts.createContactNote' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/createNote',
        'params' => [],
    ],
    'telegram.contacts.deleteContact' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/delete',
        'params' => [],
    ],
    'telegram.contacts.deleteContactNote' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/deleteNote',
        'params' => [],
    ],
    'telegram.contacts.deleteContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/deletePauseAutomation',
        'params' => [],
    ],
    'telegram.contacts.deleteContactTag' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/deleteTag',
        'params' => [],
    ],
    'telegram.contacts.deleteContactVariable' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/deleteVariable',
        'params' => [],
    ],
    'telegram.contacts.disableContact' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/disable',
        'params' => [],
    ],
    'telegram.contacts.enableContact' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/enable',
        'params' => [],
    ],
    'telegram.contacts.getContact' => [
        'method' => 'GET',
        'path'   => '/telegram/contacts/get',
        'params' => ['id' => 'string!'],
    ],
    'telegram.contacts.getContactByTelegramId' => [
        'method' => 'GET',
        'path'   => '/telegram/contacts/getByTelegramId',
        'params' => ['bot_id' => 'string!', 'telegram_id' => 'int!', 'business_connection_id' => 'string'],
    ],
    'telegram.contacts.getContactNotes' => [
        'method' => 'GET',
        'path'   => '/telegram/contacts/notes',
        'params' => ['bot_id' => 'string!', 'contact_id' => 'string!'],
    ],
    'telegram.contacts.getContactPauseAutomation' => [
        'method' => 'GET',
        'path'   => '/telegram/contacts/getPauseAutomation',
        'params' => ['contact_id' => 'string!'],
    ],
    'telegram.contacts.getContactsByTag' => [
        'method' => 'GET',
        'path'   => '/telegram/contacts/getByTag',
        'params' => ['tag' => 'string!', 'bot_id' => 'string!'],
    ],
    'telegram.contacts.getContactsByVariable' => [
        'method' => 'GET',
        'path'   => '/telegram/contacts/getByVariable',
        'params' => ['variable_id' => 'string', 'variable_name' => 'string', 'bot_id' => 'string', 'variable_value' => 'string!'],
    ],
    'telegram.contacts.markContactMessagesRead' => [
        'method' => 'PUT',
        'path'   => '/telegram/contacts/mark-read',
        'params' => ['contact_id' => 'string!'],
    ],
    'telegram.contacts.markContactMessagesUnread' => [
        'method' => 'PUT',
        'path'   => '/telegram/contacts/mark-unread',
        'params' => ['contact_id' => 'string!'],
    ],
    'telegram.contacts.openContactChat' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/openChat',
        'params' => [],
    ],
    'telegram.contacts.reactToMessage' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/react',
        'params' => [],
    ],
    'telegram.contacts.sendMessage' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/send',
        'params' => [],
    ],
    'telegram.contacts.sendTextMessage' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/sendText',
        'params' => [],
    ],
    'telegram.contacts.setContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/setPauseAutomation',
        'params' => [],
    ],
    'telegram.contacts.setContactTags' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/setTag',
        'params' => [],
    ],
    'telegram.contacts.setContactVariable' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/setVariable',
        'params' => [],
    ],
    'telegram.contacts.unassignContactOperator' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/operators/unAssign',
        'params' => [],
    ],
    'telegram.contacts.updateContactNote' => [
        'method' => 'POST',
        'path'   => '/telegram/contacts/updateNote',
        'params' => [],
    ],
    'telegram.flows.getFlows' => [
        'method' => 'GET',
        'path'   => '/telegram/flows',
        'params' => ['bot_id' => 'string!'],
    ],
    'telegram.flows.runFlow' => [
        'method' => 'POST',
        'path'   => '/telegram/flows/run',
        'params' => [],
    ],
    'telegram.flows.runFlowByTrigger' => [
        'method' => 'POST',
        'path'   => '/telegram/flows/runByTrigger',
        'params' => [],
    ],
    'telegram.tags.getTags' => [
        'method' => 'GET',
        'path'   => '/telegram/tags',
        'params' => ['bot_id' => 'string!'],
    ],
    'telegram.triggers.getTriggers' => [
        'method' => 'GET',
        'path'   => '/telegram/triggers',
        'params' => ['bot_id' => 'string!'],
    ],
    'telegram.variables.getVariables' => [
        'method' => 'GET',
        'path'   => '/telegram/variables',
        'params' => ['bot_id' => 'string!'],
    ],
];
