<?php

declare(strict_types=1);

/**
 * Operation map fragment for "live-chat" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 37 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'live-chat.account.getAccount' => [
        'method' => 'GET',
        'path'   => '/live-chat/account',
        'params' => [],
    ],
    'live-chat.bots.getBotStatistics' => [
        'method' => 'GET',
        'path'   => '/live-chat/bots/statistics',
        'params' => ['bot_id' => 'string!'],
    ],
    'live-chat.bots.getBots' => [
        'method' => 'GET',
        'path'   => '/live-chat/bots',
        'params' => [],
    ],
    'live-chat.chats.getChatMessages' => [
        'method' => 'GET',
        'path'   => '/live-chat/chats/messages',
        'params' => ['contact_id' => 'string!'],
    ],
    'live-chat.chats.getChats' => [
        'method' => 'GET',
        'path'   => '/live-chat/chats',
        'params' => ['bot_id' => 'string'],
    ],
    'live-chat.contacts.assignContactOperator' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/operators/assign',
        'params' => [],
    ],
    'live-chat.contacts.assignContactOperatorGroup' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/operators/assignGroup',
        'params' => [],
    ],
    'live-chat.contacts.closeContactChat' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/closeChat',
        'params' => [],
    ],
    'live-chat.contacts.createContactNote' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/createNote',
        'params' => [],
    ],
    'live-chat.contacts.deleteContact' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/delete',
        'params' => [],
    ],
    'live-chat.contacts.deleteContactNote' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/deleteNote',
        'params' => [],
    ],
    'live-chat.contacts.deleteContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/deletePauseAutomation',
        'params' => [],
    ],
    'live-chat.contacts.deleteContactTag' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/deleteTag',
        'params' => [],
    ],
    'live-chat.contacts.deleteContactVariable' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/deleteVariable',
        'params' => [],
    ],
    'live-chat.contacts.disableContact' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/disable',
        'params' => [],
    ],
    'live-chat.contacts.enableContact' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/enable',
        'params' => [],
    ],
    'live-chat.contacts.getContact' => [
        'method' => 'GET',
        'path'   => '/live-chat/contacts/get',
        'params' => ['id' => 'string!'],
    ],
    'live-chat.contacts.getContactNotes' => [
        'method' => 'GET',
        'path'   => '/live-chat/contacts/notes',
        'params' => ['bot_id' => 'string!', 'contact_id' => 'string!'],
    ],
    'live-chat.contacts.getContactPauseAutomation' => [
        'method' => 'GET',
        'path'   => '/live-chat/contacts/getPauseAutomation',
        'params' => ['contact_id' => 'string!'],
    ],
    'live-chat.contacts.getContactsByTag' => [
        'method' => 'GET',
        'path'   => '/live-chat/contacts/getByTag',
        'params' => ['tag' => 'string!', 'bot_id' => 'string!'],
    ],
    'live-chat.contacts.getContactsByVariable' => [
        'method' => 'GET',
        'path'   => '/live-chat/contacts/getByVariable',
        'params' => ['variable_id' => 'string', 'variable_name' => 'string', 'bot_id' => 'string', 'variable_value' => 'string!'],
    ],
    'live-chat.contacts.markContactMessagesRead' => [
        'method' => 'PUT',
        'path'   => '/live-chat/contacts/mark-read',
        'params' => ['contact_id' => 'string!'],
    ],
    'live-chat.contacts.markContactMessagesUnread' => [
        'method' => 'PUT',
        'path'   => '/live-chat/contacts/mark-unread',
        'params' => ['contact_id' => 'string!'],
    ],
    'live-chat.contacts.openContactChat' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/openChat',
        'params' => [],
    ],
    'live-chat.contacts.sendMessages' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/send',
        'params' => [],
    ],
    'live-chat.contacts.setContactName' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/setName',
        'params' => [],
    ],
    'live-chat.contacts.setContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/setPauseAutomation',
        'params' => [],
    ],
    'live-chat.contacts.setContactTags' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/setTag',
        'params' => [],
    ],
    'live-chat.contacts.setContactVariable' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/setVariable',
        'params' => [],
    ],
    'live-chat.contacts.unassignContactOperator' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/operators/unAssign',
        'params' => [],
    ],
    'live-chat.contacts.updateContactNote' => [
        'method' => 'POST',
        'path'   => '/live-chat/contacts/updateNote',
        'params' => [],
    ],
    'live-chat.flows.getFlows' => [
        'method' => 'GET',
        'path'   => '/live-chat/flows',
        'params' => ['bot_id' => 'string!'],
    ],
    'live-chat.flows.runFlow' => [
        'method' => 'POST',
        'path'   => '/live-chat/flows/run',
        'params' => [],
    ],
    'live-chat.flows.runFlowByTrigger' => [
        'method' => 'POST',
        'path'   => '/live-chat/flows/runByTrigger',
        'params' => [],
    ],
    'live-chat.tags.getTags' => [
        'method' => 'GET',
        'path'   => '/live-chat/tags',
        'params' => ['bot_id' => 'string!'],
    ],
    'live-chat.triggers.getTriggers' => [
        'method' => 'GET',
        'path'   => '/live-chat/triggers',
        'params' => ['bot_id' => 'string!'],
    ],
    'live-chat.variables.getVariables' => [
        'method' => 'GET',
        'path'   => '/live-chat/variables',
        'params' => ['bot_id' => 'string!'],
    ],
];
