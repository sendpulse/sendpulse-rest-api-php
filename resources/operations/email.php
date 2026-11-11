<?php

declare(strict_types=1);

/**
 * Operation map fragment for "email" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 60 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'email.balance.getBalance' => [
        'method' => 'GET',
        'path'   => '/balance',
        'params' => [],
    ],
    'email.balance.getBalanceByCurrency' => [
        'method' => 'GET',
        'path'   => '/balance/{currency}',
        'params' => ['currency' => 'string!'],
    ],
    'email.balance.getDetailedBalance' => [
        'method' => 'GET',
        'path'   => '/user/balance/detail',
        'params' => [],
    ],
    'email.blacklist.addToBlacklist' => [
        'method' => 'POST',
        'path'   => '/blacklist',
        'params' => [],
    ],
    'email.blacklist.getBlacklist' => [
        'method' => 'GET',
        'path'   => '/blacklist',
        'params' => [],
    ],
    'email.blacklist.removeFromBlacklist' => [
        'method' => 'DELETE',
        'path'   => '/blacklist',
        'params' => [],
    ],
    'email.campaigns.cancelCampaign' => [
        'method' => 'DELETE',
        'path'   => '/campaigns/{id}',
        'params' => ['id' => 'int!'],
    ],
    'email.campaigns.createCampaign' => [
        'method' => 'POST',
        'path'   => '/campaigns',
        'params' => [],
    ],
    'email.campaigns.getCampaignById' => [
        'method' => 'GET',
        'path'   => '/campaigns/{id}',
        'params' => ['id' => 'int!'],
    ],
    'email.campaigns.getCampaignCountryStats' => [
        'method' => 'GET',
        'path'   => '/campaigns/{id}/countries',
        'params' => ['id' => 'int!'],
    ],
    'email.campaigns.getCampaignReferralStats' => [
        'method' => 'GET',
        'path'   => '/campaigns/{id}/referrals',
        'params' => ['id' => 'int!'],
    ],
    'email.campaigns.getCampaigns' => [
        'method' => 'GET',
        'path'   => '/campaigns',
        'params' => ['limit' => 'int', 'offset' => 'int', 'order' => 'string', 'status' => 'array', 'planed' => 'bool'],
    ],
    'email.campaigns.getCampaignsByList' => [
        'method' => 'GET',
        'path'   => '/addressbooks/{id}/campaigns',
        'params' => ['id' => 'int!', 'limit' => 'int', 'offset' => 'int'],
    ],
    'email.campaigns.updateCampaign' => [
        'method' => 'PATCH',
        'path'   => '/campaigns/{id}',
        'params' => ['id' => 'int!'],
    ],
    'email.emailAddress.deleteEmailGlobally' => [
        'method' => 'DELETE',
        'path'   => '/emails/{email}',
        'params' => ['email' => 'string!'],
    ],
    'email.emailAddress.getEmailCampaignInfo' => [
        'method' => 'GET',
        'path'   => '/campaigns/{id}/email/{email}',
        'params' => ['id' => 'int!', 'email' => 'string!'],
    ],
    'email.emailAddress.getEmailCampaignStats' => [
        'method' => 'GET',
        'path'   => '/emails/{email}/campaigns',
        'params' => ['email' => 'string!'],
    ],
    'email.emailAddress.getEmailDetails' => [
        'method' => 'GET',
        'path'   => '/emails/{email}/details',
        'params' => ['email' => 'string!'],
    ],
    'email.emailAddress.getEmailFromList' => [
        'method' => 'GET',
        'path'   => '/addressbooks/{id}/emails/{email}',
        'params' => ['id' => 'int!', 'email' => 'string!'],
    ],
    'email.emailAddress.getEmailInfo' => [
        'method' => 'GET',
        'path'   => '/emails/{email}',
        'params' => ['email' => 'string!'],
    ],
    'email.emailAddress.getMultipleEmailsCampaignStats' => [
        'method' => 'POST',
        'path'   => '/emails/campaigns',
        'params' => [],
    ],
    'email.emailAddress.getMultipleEmailsInfo' => [
        'method' => 'POST',
        'path'   => '/emails',
        'params' => [],
    ],
    'email.emailAddress.updateContactVariables' => [
        'method' => 'POST',
        'path'   => '/addressbooks/{id}/emails/variable',
        'params' => ['id' => 'int!'],
    ],
    'email.mailingLists.addEmailsToMailingList' => [
        'method' => 'POST',
        'path'   => '/addressbooks/{id}/emails',
        'params' => ['id' => 'int!'],
    ],
    'email.mailingLists.createMailingList' => [
        'method' => 'POST',
        'path'   => '/addressbooks',
        'params' => [],
    ],
    'email.mailingLists.deleteEmailsFromMailingList' => [
        'method' => 'DELETE',
        'path'   => '/addressbooks/{id}/emails',
        'params' => ['id' => 'int!'],
    ],
    'email.mailingLists.deleteMailingList' => [
        'method' => 'DELETE',
        'path'   => '/addressbooks/{id}',
        'params' => ['id' => 'int!'],
    ],
    'email.mailingLists.getCampaignCostByList' => [
        'method' => 'GET',
        'path'   => '/addressbooks/{id}/cost',
        'params' => ['id' => 'int!'],
    ],
    'email.mailingLists.getContactsByVariable' => [
        'method' => 'GET',
        'path'   => '/addressbooks/{id}/variables/{variableName}/{searchValue}',
        'params' => ['id' => 'int!', 'variableName' => 'string!', 'searchValue' => 'string!'],
    ],
    'email.mailingLists.getEmailsFromMailingList' => [
        'method' => 'GET',
        'path'   => '/addressbooks/{id}/emails',
        'params' => ['id' => 'int!', 'limit' => 'int', 'offset' => 'int', 'order' => 'string', 'active' => 'bool', 'not_active' => 'bool'],
    ],
    'email.mailingLists.getEmailsTotalCount' => [
        'method' => 'GET',
        'path'   => '/addressbooks/{id}/emails/total',
        'params' => ['id' => 'int!', 'active' => 'bool'],
    ],
    'email.mailingLists.getMailingListById' => [
        'method' => 'GET',
        'path'   => '/addressbooks/{id}',
        'params' => ['id' => 'int!'],
    ],
    'email.mailingLists.getMailingListVariables' => [
        'method' => 'GET',
        'path'   => '/addressbooks/{id}/variables',
        'params' => ['id' => 'int!'],
    ],
    'email.mailingLists.getMailingLists' => [
        'method' => 'GET',
        'path'   => '/addressbooks',
        'params' => ['limit' => 'int', 'offset' => 'int'],
    ],
    'email.mailingLists.unsubscribeEmailsFromMailingList' => [
        'method' => 'POST',
        'path'   => '/addressbooks/{id}/emails/unsubscribe',
        'params' => ['id' => 'int!'],
    ],
    'email.mailingLists.updateContactPhone' => [
        'method' => 'PUT',
        'path'   => '/addressbooks/{id}/phone',
        'params' => ['id' => 'int!'],
    ],
    'email.mailingLists.updateMailingList' => [
        'method' => 'PUT',
        'path'   => '/addressbooks/{id}',
        'params' => ['id' => 'int!'],
    ],
    'email.senders.activateSender' => [
        'method' => 'POST',
        'path'   => '/senders/{email}/code',
        'params' => ['email' => 'string!'],
    ],
    'email.senders.addSender' => [
        'method' => 'POST',
        'path'   => '/senders',
        'params' => [],
    ],
    'email.senders.deleteSender' => [
        'method' => 'DELETE',
        'path'   => '/senders',
        'params' => [],
    ],
    'email.senders.getSenders' => [
        'method' => 'GET',
        'path'   => '/senders',
        'params' => [],
    ],
    'email.senders.requestSenderActivationCode' => [
        'method' => 'GET',
        'path'   => '/senders/{email}/code',
        'params' => ['email' => 'string!'],
    ],
    'email.tags.createTag' => [
        'method' => 'POST',
        'path'   => '/tags',
        'params' => [],
    ],
    'email.tags.deleteTag' => [
        'method' => 'DELETE',
        'path'   => '/tags/{id}',
        'params' => ['id' => 'int!'],
    ],
    'email.tags.getTags' => [
        'method' => 'GET',
        'path'   => '/tags',
        'params' => [],
    ],
    'email.tags.pinTagToEmail' => [
        'method' => 'POST',
        'path'   => '/tags/pin/email',
        'params' => [],
    ],
    'email.tags.pinTagToPhone' => [
        'method' => 'POST',
        'path'   => '/tags/pin/phone',
        'params' => [],
    ],
    'email.tags.unpinTagFromEmail' => [
        'method' => 'POST',
        'path'   => '/tags/unpin/email',
        'params' => [],
    ],
    'email.tags.unpinTagFromPhone' => [
        'method' => 'POST',
        'path'   => '/tags/unpin/phone',
        'params' => [],
    ],
    'email.tags.updateTag' => [
        'method' => 'PUT',
        'path'   => '/tags/{id}',
        'params' => ['id' => 'int!'],
    ],
    'email.templates.createTemplate' => [
        'method' => 'POST',
        'path'   => '/template',
        'params' => [],
    ],
    'email.templates.getTemplateById' => [
        'method' => 'GET',
        'path'   => '/template/{template_id}',
        'params' => ['template_id' => 'string!', 'owner' => 'string', 'lang' => 'string'],
    ],
    'email.templates.getTemplateBySlug' => [
        'method' => 'GET',
        'path'   => '/template/slug/{name_slug}',
        'params' => ['name_slug' => 'string!', 'owner' => 'string', 'lang' => 'string'],
    ],
    'email.templates.getTemplates' => [
        'method' => 'GET',
        'path'   => '/templates',
        'params' => ['owner' => 'string', 'only_active' => 'bool', 'limit' => 'int', 'offset' => 'int'],
    ],
    'email.templates.updateTemplate' => [
        'method' => 'POST',
        'path'   => '/template/edit/{id}',
        'params' => ['id' => 'int!'],
    ],
    'email.webhooks.createWebhook' => [
        'method' => 'POST',
        'path'   => '/v2/email-service/webhook',
        'params' => [],
    ],
    'email.webhooks.deleteWebhook' => [
        'method' => 'DELETE',
        'path'   => '/v2/email-service/webhook/{id}',
        'params' => ['id' => 'int!'],
    ],
    'email.webhooks.getWebhookById' => [
        'method' => 'GET',
        'path'   => '/v2/email-service/webhook/{id}',
        'params' => ['id' => 'int!'],
    ],
    'email.webhooks.getWebhooks' => [
        'method' => 'GET',
        'path'   => '/v2/email-service/webhook',
        'params' => [],
    ],
    'email.webhooks.updateWebhook' => [
        'method' => 'PUT',
        'path'   => '/v2/email-service/webhook/{id}',
        'params' => ['id' => 'int!'],
    ],
];
