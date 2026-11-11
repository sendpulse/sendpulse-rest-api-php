<?php

declare(strict_types=1);

/**
 * Operation map fragment for "facebook" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 45 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'facebook.account.getAccount' => [
        'method' => 'GET',
        'path'   => '/messenger/account',
        'params' => [],
    ],
    'facebook.bots.getBotStatistics' => [
        'method' => 'GET',
        'path'   => '/messenger/bots/statistics',
        'params' => ['bot_id' => 'string!'],
    ],
    'facebook.bots.getBots' => [
        'method' => 'GET',
        'path'   => '/messenger/bots',
        'params' => [],
    ],
    'facebook.campaigns.getCampaignRecipients' => [
        'method' => 'GET',
        'path'   => '/messenger/campaigns/recipients',
        'params' => ['id' => 'string!'],
    ],
    'facebook.campaigns.getCampaignReport' => [
        'method' => 'GET',
        'path'   => '/messenger/campaigns/report',
        'params' => ['id' => 'string!'],
    ],
    'facebook.campaigns.sendCampaign' => [
        'method' => 'POST',
        'path'   => '/messenger/campaigns/send',
        'params' => [],
    ],
    'facebook.chats.getChatMessages' => [
        'method' => 'GET',
        'path'   => '/messenger/chats/messages',
        'params' => ['contact_id' => 'string!'],
    ],
    'facebook.chats.getChats' => [
        'method' => 'GET',
        'path'   => '/messenger/chats',
        'params' => ['bot_id' => 'string'],
    ],
    'facebook.contacts.assignContactOperator' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/operators/assign',
        'params' => [],
    ],
    'facebook.contacts.assignContactOperatorGroup' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/operators/assignGroup',
        'params' => [],
    ],
    'facebook.contacts.closeContactChat' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/closeChat',
        'params' => [],
    ],
    'facebook.contacts.createContactNote' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/createNote',
        'params' => [],
    ],
    'facebook.contacts.deleteContact' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/delete',
        'params' => [],
    ],
    'facebook.contacts.deleteContactNote' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/deleteNote',
        'params' => [],
    ],
    'facebook.contacts.deleteContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/deletePauseAutomation',
        'params' => [],
    ],
    'facebook.contacts.deleteContactTag' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/deleteTag',
        'params' => [],
    ],
    'facebook.contacts.deleteContactVariable' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/deleteVariable',
        'params' => [],
    ],
    'facebook.contacts.disableContact' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/disable',
        'params' => [],
    ],
    'facebook.contacts.enableContact' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/enable',
        'params' => [],
    ],
    'facebook.contacts.getContact' => [
        'method' => 'GET',
        'path'   => '/messenger/contacts/get',
        'params' => ['id' => 'string!'],
    ],
    'facebook.contacts.getContactNotes' => [
        'method' => 'GET',
        'path'   => '/messenger/contacts/notes',
        'params' => ['bot_id' => 'string!', 'contact_id' => 'string!'],
    ],
    'facebook.contacts.getContactPauseAutomation' => [
        'method' => 'GET',
        'path'   => '/messenger/contacts/getPauseAutomation',
        'params' => ['contact_id' => 'string!'],
    ],
    'facebook.contacts.getContactsByTag' => [
        'method' => 'GET',
        'path'   => '/messenger/contacts/getByTag',
        'params' => ['tag' => 'string!', 'bot_id' => 'string!'],
    ],
    'facebook.contacts.getContactsByVariable' => [
        'method' => 'GET',
        'path'   => '/messenger/contacts/getByVariable',
        'params' => ['variable_id' => 'string', 'variable_name' => 'string', 'bot_id' => 'string', 'variable_value' => 'string!'],
    ],
    'facebook.contacts.markContactMessagesRead' => [
        'method' => 'PUT',
        'path'   => '/messenger/contacts/mark-read',
        'params' => ['contact_id' => 'string!'],
    ],
    'facebook.contacts.markContactMessagesUnread' => [
        'method' => 'PUT',
        'path'   => '/messenger/contacts/mark-unread',
        'params' => ['contact_id' => 'string!'],
    ],
    'facebook.contacts.openContactChat' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/openChat',
        'params' => [],
    ],
    'facebook.contacts.reactToMessage' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/react',
        'params' => [],
    ],
    'facebook.contacts.sendMessage' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/send',
        'params' => [],
    ],
    'facebook.contacts.sendTextMessage' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/sendText',
        'params' => [],
    ],
    'facebook.contacts.sendTyping' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/sendTyping',
        'params' => [],
    ],
    'facebook.contacts.setContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/setPauseAutomation',
        'params' => [],
    ],
    'facebook.contacts.setContactTags' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/setTag',
        'params' => [],
    ],
    'facebook.contacts.setContactVariable' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/setVariable',
        'params' => [],
    ],
    'facebook.contacts.unassignContactOperator' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/operators/unAssign',
        'params' => [],
    ],
    'facebook.contacts.updateContactNote' => [
        'method' => 'POST',
        'path'   => '/messenger/contacts/updateNote',
        'params' => [],
    ],
    'facebook.flows.getFlows' => [
        'method' => 'GET',
        'path'   => '/messenger/flows',
        'params' => ['bot_id' => 'string!'],
    ],
    'facebook.flows.runFlow' => [
        'method' => 'POST',
        'path'   => '/messenger/flows/run',
        'params' => [],
    ],
    'facebook.flows.runFlowByTrigger' => [
        'method' => 'POST',
        'path'   => '/messenger/flows/runByTrigger',
        'params' => [],
    ],
    'facebook.tags.getTags' => [
        'method' => 'GET',
        'path'   => '/messenger/tags',
        'params' => ['bot_id' => 'string!'],
    ],
    'facebook.templates.createTemplate' => [
        'method' => 'POST',
        'path'   => '/messenger/templates',
        'params' => [],
    ],
    'facebook.templates.deleteTemplate' => [
        'method' => 'DELETE',
        'path'   => '/messenger/templates/{id}',
        'params' => ['id' => 'string!', 'bot_id' => 'string!'],
    ],
    'facebook.templates.getTemplates' => [
        'method' => 'GET',
        'path'   => '/messenger/templates',
        'params' => ['bot_id' => 'string!', 'name' => 'string', 'locale' => 'string', 'status' => 'string'],
    ],
    'facebook.triggers.getTriggers' => [
        'method' => 'GET',
        'path'   => '/messenger/triggers',
        'params' => ['bot_id' => 'string!'],
    ],
    'facebook.variables.getVariables' => [
        'method' => 'GET',
        'path'   => '/messenger/variables',
        'params' => ['bot_id' => 'string!'],
    ],
];
