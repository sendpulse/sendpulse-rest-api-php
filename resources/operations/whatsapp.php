<?php

declare(strict_types=1);

/**
 * Operation map fragment for "whatsapp" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 51 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'whatsapp.account.getAccount' => [
        'method' => 'GET',
        'path'   => '/whatsapp/account',
        'params' => [],
    ],
    'whatsapp.bots.getBotStatistics' => [
        'method' => 'GET',
        'path'   => '/whatsapp/bots/statistics',
        'params' => ['bot_id' => 'string!'],
    ],
    'whatsapp.bots.getBots' => [
        'method' => 'GET',
        'path'   => '/whatsapp/bots',
        'params' => [],
    ],
    'whatsapp.campaigns.getCampaignRecipients' => [
        'method' => 'GET',
        'path'   => '/whatsapp/campaigns/recipients',
        'params' => ['id' => 'string!'],
    ],
    'whatsapp.campaigns.getCampaignReport' => [
        'method' => 'GET',
        'path'   => '/whatsapp/campaigns/report',
        'params' => ['id' => 'string!'],
    ],
    'whatsapp.campaigns.sendCampaign' => [
        'method' => 'POST',
        'path'   => '/whatsapp/campaigns/send',
        'params' => [],
    ],
    'whatsapp.campaigns.sendTemplateCampaign' => [
        'method' => 'POST',
        'path'   => '/whatsapp/campaigns/sendTemplate',
        'params' => [],
    ],
    'whatsapp.chats.getChatMessages' => [
        'method' => 'GET',
        'path'   => '/whatsapp/chats/messages',
        'params' => ['contact_id' => 'string!'],
    ],
    'whatsapp.chats.getChats' => [
        'method' => 'GET',
        'path'   => '/whatsapp/chats',
        'params' => ['bot_id' => 'string'],
    ],
    'whatsapp.contacts.assignContactOperator' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/operators/assign',
        'params' => [],
    ],
    'whatsapp.contacts.assignContactOperatorGroup' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/operators/assignGroup',
        'params' => [],
    ],
    'whatsapp.contacts.closeContactChat' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/closeChat',
        'params' => [],
    ],
    'whatsapp.contacts.createContact' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts',
        'params' => [],
    ],
    'whatsapp.contacts.createContactNote' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/createNote',
        'params' => [],
    ],
    'whatsapp.contacts.deleteContact' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/delete',
        'params' => [],
    ],
    'whatsapp.contacts.deleteContactNote' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/deleteNote',
        'params' => [],
    ],
    'whatsapp.contacts.deleteContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/deletePauseAutomation',
        'params' => [],
    ],
    'whatsapp.contacts.deleteContactTag' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/deleteTag',
        'params' => [],
    ],
    'whatsapp.contacts.deleteContactVariable' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/deleteVariable',
        'params' => [],
    ],
    'whatsapp.contacts.disableContact' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/disable',
        'params' => [],
    ],
    'whatsapp.contacts.enableContact' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/enable',
        'params' => [],
    ],
    'whatsapp.contacts.getContact' => [
        'method' => 'GET',
        'path'   => '/whatsapp/contacts/get',
        'params' => ['id' => 'string!'],
    ],
    'whatsapp.contacts.getContactByPhone' => [
        'method' => 'GET',
        'path'   => '/whatsapp/contacts/getByPhone',
        'params' => ['phone' => 'string!', 'bot_id' => 'string!'],
    ],
    'whatsapp.contacts.getContactNotes' => [
        'method' => 'GET',
        'path'   => '/whatsapp/contacts/notes',
        'params' => ['bot_id' => 'string!', 'contact_id' => 'string!'],
    ],
    'whatsapp.contacts.getContactPauseAutomation' => [
        'method' => 'GET',
        'path'   => '/whatsapp/contacts/getPauseAutomation',
        'params' => ['contact_id' => 'string!'],
    ],
    'whatsapp.contacts.getContactsByTag' => [
        'method' => 'GET',
        'path'   => '/whatsapp/contacts/getByTag',
        'params' => ['tag' => 'string!', 'bot_id' => 'string!'],
    ],
    'whatsapp.contacts.getContactsByVariable' => [
        'method' => 'GET',
        'path'   => '/whatsapp/contacts/getByVariable',
        'params' => ['variable_id' => 'string', 'variable_name' => 'string', 'bot_id' => 'string', 'variable_value' => 'string!'],
    ],
    'whatsapp.contacts.markContactMessagesRead' => [
        'method' => 'PUT',
        'path'   => '/whatsapp/contacts/mark-read',
        'params' => ['contact_id' => 'string!'],
    ],
    'whatsapp.contacts.markContactMessagesUnread' => [
        'method' => 'PUT',
        'path'   => '/whatsapp/contacts/mark-unread',
        'params' => ['contact_id' => 'string!'],
    ],
    'whatsapp.contacts.openContactChat' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/openChat',
        'params' => [],
    ],
    'whatsapp.contacts.reactToMessage' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/react',
        'params' => [],
    ],
    'whatsapp.contacts.sendMessage' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/send',
        'params' => [],
    ],
    'whatsapp.contacts.sendMessageByPhone' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/sendByPhone',
        'params' => [],
    ],
    'whatsapp.contacts.sendTemplateMessage' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/sendTemplate',
        'params' => [],
    ],
    'whatsapp.contacts.sendTemplateMessageByPhone' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/sendTemplateByPhone',
        'params' => [],
    ],
    'whatsapp.contacts.sendTyping' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/sendTyping',
        'params' => [],
    ],
    'whatsapp.contacts.setContactName' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/setName',
        'params' => [],
    ],
    'whatsapp.contacts.setContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/setPauseAutomation',
        'params' => [],
    ],
    'whatsapp.contacts.setContactTags' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/setTag',
        'params' => [],
    ],
    'whatsapp.contacts.setContactVariable' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/setVariable',
        'params' => [],
    ],
    'whatsapp.contacts.unassignContactOperator' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/operators/unAssign',
        'params' => [],
    ],
    'whatsapp.contacts.updateContactNote' => [
        'method' => 'POST',
        'path'   => '/whatsapp/contacts/updateNote',
        'params' => [],
    ],
    'whatsapp.flows.getFlows' => [
        'method' => 'GET',
        'path'   => '/whatsapp/flows',
        'params' => ['bot_id' => 'string!'],
    ],
    'whatsapp.flows.runFlow' => [
        'method' => 'POST',
        'path'   => '/whatsapp/flows/run',
        'params' => [],
    ],
    'whatsapp.flows.runFlowByTrigger' => [
        'method' => 'POST',
        'path'   => '/whatsapp/flows/runByTrigger',
        'params' => [],
    ],
    'whatsapp.tags.getTags' => [
        'method' => 'GET',
        'path'   => '/whatsapp/tags',
        'params' => ['bot_id' => 'string!'],
    ],
    'whatsapp.templates.createTemplate' => [
        'method' => 'POST',
        'path'   => '/whatsapp/templates',
        'params' => [],
    ],
    'whatsapp.templates.deleteTemplate' => [
        'method' => 'DELETE',
        'path'   => '/whatsapp/templates/{id}',
        'params' => ['id' => 'string!', 'bot_id' => 'string!'],
    ],
    'whatsapp.templates.getTemplates' => [
        'method' => 'GET',
        'path'   => '/whatsapp/templates',
        'params' => ['bot_id' => 'string!', 'name' => 'string', 'locale' => 'string', 'status' => 'string', 'category' => 'string'],
    ],
    'whatsapp.triggers.getTriggers' => [
        'method' => 'GET',
        'path'   => '/whatsapp/triggers',
        'params' => ['bot_id' => 'string!'],
    ],
    'whatsapp.variables.getVariables' => [
        'method' => 'GET',
        'path'   => '/whatsapp/variables',
        'params' => ['bot_id' => 'string!'],
    ],
];
