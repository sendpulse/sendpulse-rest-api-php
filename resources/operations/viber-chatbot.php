<?php

declare(strict_types=1);

/**
 * Operation map fragment for "viber-chatbot" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 39 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'viber-chatbot.account.getAccount' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/account',
        'params' => [],
    ],
    'viber-chatbot.bots.getBotStatistics' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/bots/statistics',
        'params' => ['bot_id' => 'string!'],
    ],
    'viber-chatbot.bots.getBots' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/bots',
        'params' => [],
    ],
    'viber-chatbot.campaigns.getCampaignRecipients' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/campaigns/recipients',
        'params' => ['id' => 'string!'],
    ],
    'viber-chatbot.campaigns.getCampaignReport' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/campaigns/report',
        'params' => ['id' => 'string!'],
    ],
    'viber-chatbot.campaigns.sendCampaign' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/campaigns/send',
        'params' => [],
    ],
    'viber-chatbot.chats.getChatMessages' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/chats/messages',
        'params' => ['contact_id' => 'string!'],
    ],
    'viber-chatbot.chats.getChats' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/chats',
        'params' => ['bot_id' => 'string'],
    ],
    'viber-chatbot.contacts.assignContactOperator' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/operators/assign',
        'params' => [],
    ],
    'viber-chatbot.contacts.assignContactOperatorGroup' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/operators/assignGroup',
        'params' => [],
    ],
    'viber-chatbot.contacts.closeContactChat' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/closeChat',
        'params' => [],
    ],
    'viber-chatbot.contacts.createContactNote' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/createNote',
        'params' => [],
    ],
    'viber-chatbot.contacts.deleteContact' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/delete',
        'params' => [],
    ],
    'viber-chatbot.contacts.deleteContactNote' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/deleteNote',
        'params' => [],
    ],
    'viber-chatbot.contacts.deleteContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/deletePauseAutomation',
        'params' => [],
    ],
    'viber-chatbot.contacts.deleteContactTag' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/deleteTag',
        'params' => [],
    ],
    'viber-chatbot.contacts.deleteContactVariable' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/deleteVariable',
        'params' => [],
    ],
    'viber-chatbot.contacts.disableContact' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/disable',
        'params' => [],
    ],
    'viber-chatbot.contacts.enableContact' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/enable',
        'params' => [],
    ],
    'viber-chatbot.contacts.getContact' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/contacts/get',
        'params' => ['id' => 'string!'],
    ],
    'viber-chatbot.contacts.getContactNotes' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/contacts/notes',
        'params' => ['bot_id' => 'string!', 'contact_id' => 'string!'],
    ],
    'viber-chatbot.contacts.getContactPauseAutomation' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/contacts/getPauseAutomation',
        'params' => ['contact_id' => 'string!'],
    ],
    'viber-chatbot.contacts.getContactsByTag' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/contacts/getByTag',
        'params' => ['tag' => 'string!', 'bot_id' => 'string!'],
    ],
    'viber-chatbot.contacts.getContactsByVariable' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/contacts/getByVariable',
        'params' => ['variable_id' => 'string', 'variable_name' => 'string', 'bot_id' => 'string', 'variable_value' => 'string!'],
    ],
    'viber-chatbot.contacts.markContactMessagesRead' => [
        'method' => 'PUT',
        'path'   => '/viber/chatbots/contacts/mark-read',
        'params' => ['contact_id' => 'string!'],
    ],
    'viber-chatbot.contacts.markContactMessagesUnread' => [
        'method' => 'PUT',
        'path'   => '/viber/chatbots/contacts/mark-unread',
        'params' => ['contact_id' => 'string!'],
    ],
    'viber-chatbot.contacts.openContactChat' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/openChat',
        'params' => [],
    ],
    'viber-chatbot.contacts.sendMessages' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/send',
        'params' => [],
    ],
    'viber-chatbot.contacts.setContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/setPauseAutomation',
        'params' => [],
    ],
    'viber-chatbot.contacts.setContactTags' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/setTag',
        'params' => [],
    ],
    'viber-chatbot.contacts.setContactVariable' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/setVariable',
        'params' => [],
    ],
    'viber-chatbot.contacts.unassignContactOperator' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/operators/unAssign',
        'params' => [],
    ],
    'viber-chatbot.contacts.updateContactNote' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/contacts/updateNote',
        'params' => [],
    ],
    'viber-chatbot.flows.getFlows' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/flows',
        'params' => ['bot_id' => 'string!'],
    ],
    'viber-chatbot.flows.runFlow' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/flows/run',
        'params' => [],
    ],
    'viber-chatbot.flows.runFlowByTrigger' => [
        'method' => 'POST',
        'path'   => '/viber/chatbots/flows/runByTrigger',
        'params' => [],
    ],
    'viber-chatbot.tags.getTags' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/tags',
        'params' => ['bot_id' => 'string!'],
    ],
    'viber-chatbot.triggers.getTriggers' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/triggers',
        'params' => ['bot_id' => 'string!'],
    ],
    'viber-chatbot.variables.getVariables' => [
        'method' => 'GET',
        'path'   => '/viber/chatbots/variables',
        'params' => ['bot_id' => 'string!'],
    ],
];
