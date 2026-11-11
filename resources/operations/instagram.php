<?php

declare(strict_types=1);

/**
 * Operation map fragment for "instagram" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 40 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'instagram.account.getAccount' => [
        'method' => 'GET',
        'path'   => '/instagram/account',
        'params' => [],
    ],
    'instagram.bots.getBotStatistics' => [
        'method' => 'GET',
        'path'   => '/instagram/bots/statistics',
        'params' => ['bot_id' => 'string!'],
    ],
    'instagram.bots.getBots' => [
        'method' => 'GET',
        'path'   => '/instagram/bots',
        'params' => [],
    ],
    'instagram.campaigns.getCampaignRecipients' => [
        'method' => 'GET',
        'path'   => '/instagram/campaigns/recipients',
        'params' => ['id' => 'string!'],
    ],
    'instagram.campaigns.getCampaignReport' => [
        'method' => 'GET',
        'path'   => '/instagram/campaigns/report',
        'params' => ['id' => 'string!'],
    ],
    'instagram.campaigns.sendCampaign' => [
        'method' => 'POST',
        'path'   => '/instagram/campaigns/send',
        'params' => [],
    ],
    'instagram.chats.getChatMessages' => [
        'method' => 'GET',
        'path'   => '/instagram/chats/messages',
        'params' => ['contact_id' => 'string!'],
    ],
    'instagram.chats.getChats' => [
        'method' => 'GET',
        'path'   => '/instagram/chats',
        'params' => ['bot_id' => 'string'],
    ],
    'instagram.contacts.assignContactOperator' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/operators/assign',
        'params' => [],
    ],
    'instagram.contacts.assignContactOperatorGroup' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/operators/assignGroup',
        'params' => [],
    ],
    'instagram.contacts.closeContactChat' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/closeChat',
        'params' => [],
    ],
    'instagram.contacts.createContactNote' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/createNote',
        'params' => [],
    ],
    'instagram.contacts.deleteContact' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/delete',
        'params' => [],
    ],
    'instagram.contacts.deleteContactNote' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/deleteNote',
        'params' => [],
    ],
    'instagram.contacts.deleteContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/deletePauseAutomation',
        'params' => [],
    ],
    'instagram.contacts.deleteContactTag' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/deleteTag',
        'params' => [],
    ],
    'instagram.contacts.deleteContactVariable' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/deleteVariable',
        'params' => [],
    ],
    'instagram.contacts.disableContact' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/disable',
        'params' => [],
    ],
    'instagram.contacts.enableContact' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/enable',
        'params' => [],
    ],
    'instagram.contacts.getContact' => [
        'method' => 'GET',
        'path'   => '/instagram/contacts/get',
        'params' => ['id' => 'string!'],
    ],
    'instagram.contacts.getContactNotes' => [
        'method' => 'GET',
        'path'   => '/instagram/contacts/notes',
        'params' => ['bot_id' => 'string!', 'contact_id' => 'string!'],
    ],
    'instagram.contacts.getContactPauseAutomation' => [
        'method' => 'GET',
        'path'   => '/instagram/contacts/getPauseAutomation',
        'params' => ['contact_id' => 'string!'],
    ],
    'instagram.contacts.getContactsByTag' => [
        'method' => 'GET',
        'path'   => '/instagram/contacts/getByTag',
        'params' => ['tag' => 'string!', 'bot_id' => 'string!'],
    ],
    'instagram.contacts.getContactsByVariable' => [
        'method' => 'GET',
        'path'   => '/instagram/contacts/getByVariable',
        'params' => ['variable_id' => 'string', 'variable_name' => 'string', 'bot_id' => 'string', 'variable_value' => 'string!'],
    ],
    'instagram.contacts.markContactMessagesRead' => [
        'method' => 'PUT',
        'path'   => '/instagram/contacts/mark-read',
        'params' => ['contact_id' => 'string!'],
    ],
    'instagram.contacts.markContactMessagesUnread' => [
        'method' => 'PUT',
        'path'   => '/instagram/contacts/mark-unread',
        'params' => ['contact_id' => 'string!'],
    ],
    'instagram.contacts.openContactChat' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/openChat',
        'params' => [],
    ],
    'instagram.contacts.reactToMessage' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/react',
        'params' => [],
    ],
    'instagram.contacts.sendMessages' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/send',
        'params' => [],
    ],
    'instagram.contacts.setContactPauseAutomation' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/setPauseAutomation',
        'params' => [],
    ],
    'instagram.contacts.setContactTags' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/setTag',
        'params' => [],
    ],
    'instagram.contacts.setContactVariable' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/setVariable',
        'params' => [],
    ],
    'instagram.contacts.unassignContactOperator' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/operators/unAssign',
        'params' => [],
    ],
    'instagram.contacts.updateContactNote' => [
        'method' => 'POST',
        'path'   => '/instagram/contacts/updateNote',
        'params' => [],
    ],
    'instagram.flows.getFlows' => [
        'method' => 'GET',
        'path'   => '/instagram/flows',
        'params' => ['bot_id' => 'string!'],
    ],
    'instagram.flows.runFlow' => [
        'method' => 'POST',
        'path'   => '/instagram/flows/run',
        'params' => [],
    ],
    'instagram.flows.runFlowByTrigger' => [
        'method' => 'POST',
        'path'   => '/instagram/flows/runByTrigger',
        'params' => [],
    ],
    'instagram.tags.getTags' => [
        'method' => 'GET',
        'path'   => '/instagram/tags',
        'params' => ['bot_id' => 'string!'],
    ],
    'instagram.triggers.getTriggers' => [
        'method' => 'GET',
        'path'   => '/instagram/triggers',
        'params' => ['bot_id' => 'string!'],
    ],
    'instagram.variables.getVariables' => [
        'method' => 'GET',
        'path'   => '/instagram/variables',
        'params' => ['bot_id' => 'string!'],
    ],
];
