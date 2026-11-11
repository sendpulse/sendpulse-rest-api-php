<?php

declare(strict_types=1);

/**
 * Operation map fragment for "crm" — GENERATED, do not edit by hand.
 * Regenerate with the sdk-generator. 214 operations.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

return [
    'crm.attachments.batchCreateAttachments' => [
        'method' => 'POST',
        'path'   => '/crm/v1/attachments/batch',
        'params' => [],
    ],
    'crm.attachments.createAttachment' => [
        'method' => 'POST',
        'path'   => '/crm/v1/attachments',
        'params' => [],
    ],
    'crm.attachments.deleteAttachment' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/attachments/{attachmentId}',
        'params' => ['attachmentId' => 'string!'],
    ],
    'crm.attachments.updateAttachment' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/attachments/{attachmentId}',
        'params' => ['attachmentId' => 'string!'],
    ],
    'crm.attachments.uploadFiles' => [
        'method' => 'POST',
        'path'   => '/crm/v1/files/upload',
        'params' => [],
    ],
    'crm.boards.createBoard' => [
        'method' => 'POST',
        'path'   => '/crm/v1/boards',
        'params' => [],
    ],
    'crm.boards.createBoardAttribute' => [
        'method' => 'POST',
        'path'   => '/crm/v1/boards/{boardId}/attributes',
        'params' => ['boardId' => 'string!'],
    ],
    'crm.boards.createBoardStep' => [
        'method' => 'POST',
        'path'   => '/crm/v1/boards/{boardId}/steps',
        'params' => ['boardId' => 'string!'],
    ],
    'crm.boards.getBoard' => [
        'method' => 'GET',
        'path'   => '/crm/v1/boards/{boardId}',
        'params' => ['boardId' => 'string!'],
    ],
    'crm.boards.listBoardAttributes' => [
        'method' => 'GET',
        'path'   => '/crm/v1/boards/{boardId}/attributes',
        'params' => ['boardId' => 'string!'],
    ],
    'crm.boards.listBoards' => [
        'method' => 'GET',
        'path'   => '/crm/v1/boards',
        'params' => [],
    ],
    'crm.boards.updateBoard' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/boards/{boardId}',
        'params' => ['boardId' => 'string!'],
    ],
    'crm.boards.updateBoardAttribute' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/boards/{boardId}/attributes/{attributeId}',
        'params' => ['boardId' => 'string!', 'attributeId' => 'string!'],
    ],
    'crm.boards.updateBoardStep' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/boards/{boardId}/steps/{stepId}',
        'params' => ['boardId' => 'string!', 'stepId' => 'string!'],
    ],
    'crm.comments.createCompanyComment' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies/{companyId}/comments',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.comments.createContactComment' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contacts/{contactId}/comments',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.comments.createDealComment' => [
        'method' => 'POST',
        'path'   => '/crm/v1/deals/{dealId}/comments',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.comments.createTaskComment' => [
        'method' => 'POST',
        'path'   => '/crm/v1/tasks/{taskId}/comments',
        'params' => ['taskId' => 'string!'],
    ],
    'crm.comments.deleteCompanyComment' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/companies/{companyId}/comments/{commentId}',
        'params' => ['companyId' => 'string!', 'commentId' => 'string!'],
    ],
    'crm.comments.deleteContactComment' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/contacts/{contactId}/comments/{commentId}',
        'params' => ['contactId' => 'string!', 'commentId' => 'string!'],
    ],
    'crm.comments.deleteDealComment' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/deals/{dealId}/comments/{commentId}',
        'params' => ['dealId' => 'string!', 'commentId' => 'string!'],
    ],
    'crm.comments.deleteTaskComment' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/tasks/{taskId}/comments/{commentId}',
        'params' => ['taskId' => 'string!', 'commentId' => 'string!'],
    ],
    'crm.comments.listCompanyComments' => [
        'method' => 'GET',
        'path'   => '/crm/v1/companies/{companyId}/comments',
        'params' => ['message' => 'string', 'limit' => 'int', 'offset' => 'int', 'companyId' => 'string!'],
    ],
    'crm.comments.listContactComments' => [
        'method' => 'GET',
        'path'   => '/crm/v1/contacts/{contactId}/comments',
        'params' => ['message' => 'string', 'limit' => 'int', 'offset' => 'int', 'contactId' => 'string!'],
    ],
    'crm.comments.listDealComments' => [
        'method' => 'GET',
        'path'   => '/crm/v1/deals/{dealId}/comments',
        'params' => ['message' => 'string', 'limit' => 'int', 'offset' => 'int', 'dealId' => 'string!'],
    ],
    'crm.comments.listTaskComments' => [
        'method' => 'GET',
        'path'   => '/crm/v1/tasks/{taskId}/comments',
        'params' => ['message' => 'string', 'limit' => 'int', 'offset' => 'int', 'taskId' => 'string!'],
    ],
    'crm.comments.updateCompanyComment' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/companies/{companyId}/comments/{commentId}',
        'params' => ['companyId' => 'string!', 'commentId' => 'string!'],
    ],
    'crm.comments.updateContactComment' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/contacts/{contactId}/comments/{commentId}',
        'params' => ['contactId' => 'string!', 'commentId' => 'string!'],
    ],
    'crm.comments.updateDealComment' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/deals/{dealId}/comments/{commentId}',
        'params' => ['dealId' => 'string!', 'commentId' => 'string!'],
    ],
    'crm.comments.updateTaskComment' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/tasks/{taskId}/comments/{commentId}',
        'params' => ['taskId' => 'string!', 'commentId' => 'string!'],
    ],
    'crm.companies.batchDeleteCompanies' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/companies/batch-delete',
        'params' => [],
    ],
    'crm.companies.createCompany' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies',
        'params' => [],
    ],
    'crm.companies.deleteCompany' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/companies/{companyId}',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companies.getCompany' => [
        'method' => 'GET',
        'path'   => '/crm/v1/companies/{companyId}',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companies.getCompanyHistory' => [
        'method' => 'GET',
        'path'   => '/crm/v1/companies/{companyId}/history',
        'params' => ['dateFrom' => 'string', 'dateTo' => 'string', 'limit' => 'int', 'offset' => 'int', 'companyId' => 'string!'],
    ],
    'crm.companies.searchCompanies' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies/list',
        'params' => [],
    ],
    'crm.companies.searchCompaniesShort' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies/short-data',
        'params' => [],
    ],
    'crm.companies.updateCompany' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/companies/{companyId}',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companyAttributes.batchSetCompanyAttributeValues' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies/{companyId}/attributes/batch',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companyAttributes.createCompanyAttribute' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies/attributes',
        'params' => [],
    ],
    'crm.companyAttributes.deleteCompanyAttribute' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/companies/attributes/{attributeId}',
        'params' => ['attributeId' => 'string!'],
    ],
    'crm.companyAttributes.deleteCompanyAttributeValue' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/companies/{companyId}/attributes/{attributeId}',
        'params' => ['companyId' => 'string!', 'attributeId' => 'string!'],
    ],
    'crm.companyAttributes.listCompanyAttributeValues' => [
        'method' => 'GET',
        'path'   => '/crm/v1/companies/{companyId}/attributes',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companyAttributes.listCompanyAttributes' => [
        'method' => 'GET',
        'path'   => '/crm/v1/companies/attributes',
        'params' => [],
    ],
    'crm.companyAttributes.setCompanyAttributeValue' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies/{companyId}/attributes',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companyAttributes.updateCompanyAttribute' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/companies/attributes/{attributeId}',
        'params' => ['attributeId' => 'string!'],
    ],
    'crm.companyAttributes.updateCompanyAttributeValue' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/companies/{companyId}/attributes/{attributeId}',
        'params' => ['companyId' => 'string!', 'attributeId' => 'string!'],
    ],
    'crm.companyChannels.addCompanyEmail' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies/{companyId}/emails',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companyChannels.addCompanyMessenger' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies/{companyId}/messengers',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companyChannels.addCompanyPhone' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies/{companyId}/phones',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companyChannels.batchAddCompanyEmails' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies/{companyId}/emails/batch',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companyChannels.batchAddCompanyMessengers' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies/{companyId}/messengers/batch',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companyChannels.batchAddCompanyPhones' => [
        'method' => 'POST',
        'path'   => '/crm/v1/companies/{companyId}/phones/batch',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companyChannels.deleteCompanyEmail' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/companies/{companyId}/emails/{emailId}',
        'params' => ['companyId' => 'string!', 'emailId' => 'string!'],
    ],
    'crm.companyChannels.deleteCompanyMessenger' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/companies/{companyId}/messengers/{messengerId}',
        'params' => ['companyId' => 'string!', 'messengerId' => 'string!'],
    ],
    'crm.companyChannels.deleteCompanyPhone' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/companies/{companyId}/phones/{phoneId}',
        'params' => ['companyId' => 'string!', 'phoneId' => 'string!'],
    ],
    'crm.companyChannels.listCompanyEmails' => [
        'method' => 'GET',
        'path'   => '/crm/v1/companies/{companyId}/emails',
        'params' => ['email' => 'string', 'limit' => 'int', 'offset' => 'int', 'companyId' => 'string!'],
    ],
    'crm.companyChannels.listCompanyMessengers' => [
        'method' => 'GET',
        'path'   => '/crm/v1/companies/{companyId}/messengers',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companyChannels.listCompanyPhones' => [
        'method' => 'GET',
        'path'   => '/crm/v1/companies/{companyId}/phones',
        'params' => ['companyId' => 'string!'],
    ],
    'crm.companyChannels.updateCompanyEmail' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/companies/{companyId}/emails/{emailId}',
        'params' => ['companyId' => 'string!', 'emailId' => 'string!'],
    ],
    'crm.companyChannels.updateCompanyMessenger' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/companies/{companyId}/messengers/{messengerId}',
        'params' => ['companyId' => 'string!', 'messengerId' => 'string!'],
    ],
    'crm.companyChannels.updateCompanyPhone' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/companies/{companyId}/phones/{phoneId}',
        'params' => ['companyId' => 'string!', 'phoneId' => 'string!'],
    ],
    'crm.contactAttributes.batchSetContactAttributeValues' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contacts/{contactId}/attributes/batch',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.contactAttributes.createContactAttribute' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contacts/attributes',
        'params' => [],
    ],
    'crm.contactAttributes.deleteContactAttribute' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/contacts/attributes/{attributeId}',
        'params' => ['attributeId' => 'string!'],
    ],
    'crm.contactAttributes.deleteContactAttributeValue' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/contacts/{contactId}/attributes/{attributeId}',
        'params' => ['contactId' => 'string!', 'attributeId' => 'string!'],
    ],
    'crm.contactAttributes.listContactAttributeValues' => [
        'method' => 'GET',
        'path'   => '/crm/v1/contacts/{contactId}/attributes',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.contactAttributes.listContactAttributes' => [
        'method' => 'GET',
        'path'   => '/crm/v1/contacts/attributes',
        'params' => [],
    ],
    'crm.contactAttributes.setContactAttributeValue' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contacts/{contactId}/attributes',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.contactAttributes.updateContactAttribute' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/contacts/attributes/{attributeId}',
        'params' => ['attributeId' => 'string!'],
    ],
    'crm.contactAttributes.updateContactAttributeValue' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/contacts/{contactId}/attributes/{attributeId}',
        'params' => ['contactId' => 'string!', 'attributeId' => 'string!'],
    ],
    'crm.contactChannels.addContactEmails' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contacts/{contactId}/emails',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.contactChannels.addContactMessenger' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contacts/{contactId}/messengers',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.contactChannels.addContactPhone' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contacts/{contactId}/phones',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.contactChannels.deleteContactEmail' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/contacts/{contactId}/emails/{emailId}',
        'params' => ['contactId' => 'string!', 'emailId' => 'string!'],
    ],
    'crm.contactChannels.deleteContactMessenger' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/contacts/{contactId}/messengers/{messengerId}',
        'params' => ['contactId' => 'string!', 'messengerId' => 'string!'],
    ],
    'crm.contactChannels.deleteContactPhone' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/contacts/{contactId}/phones/{phoneId}',
        'params' => ['contactId' => 'string!', 'phoneId' => 'string!'],
    ],
    'crm.contactChannels.updateContactEmail' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/contacts/{contactId}/emails/{emailId}',
        'params' => ['contactId' => 'string!', 'emailId' => 'string!'],
    ],
    'crm.contactChannels.updateContactMessenger' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/contacts/{contactId}/messengers/{messengerId}',
        'params' => ['contactId' => 'string!', 'messengerId' => 'string!'],
    ],
    'crm.contactChannels.updateContactPhone' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/contacts/{contactId}/phones/{phoneId}',
        'params' => ['contactId' => 'string!', 'phoneId' => 'string!'],
    ],
    'crm.contacts.attachContactToCompany' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contacts/{contactId}/relation/{companyId}',
        'params' => ['contactId' => 'string!', 'companyId' => 'string!'],
    ],
    'crm.contacts.createContact' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contacts/create',
        'params' => [],
    ],
    'crm.contacts.deleteContact' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/contacts/{contactId}',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.contacts.detachContactFromCompany' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/contacts/{contactId}/relation/{companyId}',
        'params' => ['contactId' => 'string!', 'companyId' => 'string!'],
    ],
    'crm.contacts.getContact' => [
        'method' => 'GET',
        'path'   => '/crm/v1/contacts/{contactId}',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.contacts.getContactByExternalId' => [
        'method' => 'GET',
        'path'   => '/crm/v1/contacts/external/{externalContactId}',
        'params' => ['externalContactId' => 'string!'],
    ],
    'crm.contacts.getContactByMessengerContactId' => [
        'method' => 'GET',
        'path'   => '/crm/v1/contacts/messenger-external/{messengerContactId}',
        'params' => ['messengerContactId' => 'string!'],
    ],
    'crm.contacts.getContactEduStatistics' => [
        'method' => 'GET',
        'path'   => '/crm/v1/contacts/{contactId}/edu-statistic',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.contacts.getContactHistory' => [
        'method' => 'GET',
        'path'   => '/crm/v1/contacts/{contactId}/history',
        'params' => ['fromDate' => 'string!', 'toDate' => 'string!', 'contactId' => 'string!'],
    ],
    'crm.contacts.listContactDeals' => [
        'method' => 'GET',
        'path'   => '/crm/v1/contacts/{contactId}/deals',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.contacts.listContactEduPayments' => [
        'method' => 'GET',
        'path'   => '/crm/v1/contacts/{contactId}/edu-payments',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.contacts.searchContacts' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contacts/get-list',
        'params' => [],
    ],
    'crm.contacts.searchContactsByEmail' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contacts/get-list-by-email',
        'params' => [],
    ],
    'crm.contacts.updateContact' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/contacts/{contactId}',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.customTabs.addCustomTabAttributes' => [
        'method' => 'POST',
        'path'   => '/crm/v1/custom-tab/{customTabId}/relation',
        'params' => ['customTabId' => 'string!'],
    ],
    'crm.customTabs.createCustomTab' => [
        'method' => 'POST',
        'path'   => '/crm/v1/custom-tab',
        'params' => [],
    ],
    'crm.customTabs.deleteCustomTab' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/custom-tab/{customTabId}',
        'params' => ['customTabId' => 'string!'],
    ],
    'crm.customTabs.listCustomTabs' => [
        'method' => 'GET',
        'path'   => '/crm/v1/custom-tab',
        'params' => [],
    ],
    'crm.customTabs.removeCustomTabAttributes' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/custom-tab/{customTabId}/relation',
        'params' => ['customTabId' => 'string!'],
    ],
    'crm.customTabs.updateCustomTab' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/custom-tab/{customTabId}',
        'params' => ['customTabId' => 'string!'],
    ],
    'crm.dealAttributes.createDealAttribute' => [
        'method' => 'POST',
        'path'   => '/crm/v1/pipelines/{pipelineId}/attributes',
        'params' => ['pipelineId' => 'string!'],
    ],
    'crm.dealAttributes.deleteDealAttribute' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/pipelines/{pipelineId}/attributes/{attributeId}',
        'params' => ['pipelineId' => 'string!', 'attributeId' => 'string!'],
    ],
    'crm.dealAttributes.deleteDealAttributeValue' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/deals/{dealId}/attributes/{attributeId}',
        'params' => ['dealId' => 'string!', 'attributeId' => 'string!'],
    ],
    'crm.dealAttributes.listDealAttributeValues' => [
        'method' => 'GET',
        'path'   => '/crm/v1/deals/{dealId}/attributes',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.dealAttributes.listDealAttributes' => [
        'method' => 'GET',
        'path'   => '/crm/v1/pipelines/{pipelineId}/attributes',
        'params' => ['pipelineId' => 'string!'],
    ],
    'crm.dealAttributes.listDealAttributesByPipeline' => [
        'method' => 'GET',
        'path'   => '/crm/v1/deals/attributes/{pipelineId}',
        'params' => ['pipelineId' => 'string!'],
    ],
    'crm.dealAttributes.setDealAttributeValue' => [
        'method' => 'POST',
        'path'   => '/crm/v1/deals/{dealId}/attributes',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.dealAttributes.updateDealAttribute' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/pipelines/{pipelineId}/attributes/{attributeId}',
        'params' => ['pipelineId' => 'string!', 'attributeId' => 'string!'],
    ],
    'crm.dealAttributes.updateDealAttributeValue' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/deals/{dealId}/attributes/{attributeId}',
        'params' => ['dealId' => 'string!', 'attributeId' => 'string!'],
    ],
    'crm.dealContacts.attachContactToDeal' => [
        'method' => 'POST',
        'path'   => '/crm/v1/deals/{dealId}/contacts/{contactId}',
        'params' => ['dealId' => 'string!', 'contactId' => 'string!'],
    ],
    'crm.dealContacts.detachContactFromDeal' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/deals/{dealId}/contacts/{contactId}',
        'params' => ['dealId' => 'string!', 'contactId' => 'string!'],
    ],
    'crm.dealContacts.listDealContacts' => [
        'method' => 'GET',
        'path'   => '/crm/v1/deals/{dealId}/contacts',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.dealExpenses.createDealExpense' => [
        'method' => 'POST',
        'path'   => '/crm/v1/deal-expenses',
        'params' => [],
    ],
    'crm.dealExpenses.deleteDealExpense' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/deal-expenses/{id}',
        'params' => ['id' => 'string!'],
    ],
    'crm.dealExpenses.getDealExpense' => [
        'method' => 'GET',
        'path'   => '/crm/v1/deal-expenses/{id}',
        'params' => ['id' => 'string!'],
    ],
    'crm.dealExpenses.listDealExpenses' => [
        'method' => 'GET',
        'path'   => '/crm/v1/deal-expenses/deal/{dealId}',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.dealExpenses.updateDealExpense' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/deal-expenses/{id}',
        'params' => ['id' => 'string!'],
    ],
    'crm.dealProducts.addProductToDeal' => [
        'method' => 'POST',
        'path'   => '/crm/v1/products/deals',
        'params' => [],
    ],
    'crm.dealProducts.listContactDealProducts' => [
        'method' => 'GET',
        'path'   => '/crm/v1/products/contacts/{contactId}/deals',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.dealProducts.listDealProducts' => [
        'method' => 'GET',
        'path'   => '/crm/v1/products/deals/{id}',
        'params' => ['id' => 'int!'],
    ],
    'crm.dealProducts.removeProductFromDeal' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/products/categories/{categoryId}/{productId}/deals/{headId}',
        'params' => ['headId' => 'int!', 'categoryId' => 'string!', 'productId' => 'string!'],
    ],
    'crm.dealProducts.updateDealProduct' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/products/deals/{id}',
        'params' => ['id' => 'int!'],
    ],
    'crm.deals.changeDealPipeline' => [
        'method' => 'POST',
        'path'   => '/crm/v1/deals/{dealId}/change-pipeline',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.deals.createDeal' => [
        'method' => 'POST',
        'path'   => '/crm/v1/deals',
        'params' => [],
    ],
    'crm.deals.deleteDeal' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/deals/{dealId}',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.deals.deleteDealExpiration' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/deals/{dealId}/expiration',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.deals.getDeal' => [
        'method' => 'GET',
        'path'   => '/crm/v1/deals/{dealId}',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.deals.getDealHistory' => [
        'method' => 'GET',
        'path'   => '/crm/v1/deals/{dealId}/history',
        'params' => ['fromDate' => 'string!', 'toDate' => 'string!', 'dealId' => 'string!'],
    ],
    'crm.deals.searchDeals' => [
        'method' => 'POST',
        'path'   => '/crm/v1/deals/get-list',
        'params' => [],
    ],
    'crm.deals.setDealExpiration' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/deals/{dealId}/expiration',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.deals.updateDeal' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/deals/{dealId}',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.failReasons.createFailReason' => [
        'method' => 'POST',
        'path'   => '/crm/v1/pipelines/{pipelineId}/fail-reasons',
        'params' => ['pipelineId' => 'string!'],
    ],
    'crm.failReasons.deleteFailReason' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/pipelines/{pipelineId}/fail-reasons/{reasonId}',
        'params' => ['pipelineId' => 'string!', 'reasonId' => 'string!'],
    ],
    'crm.failReasons.listDealFailReasonEntries' => [
        'method' => 'GET',
        'path'   => '/crm/v1/pipelines/{pipelineId}/deals/{dealId}/fail-reasons',
        'params' => ['limit' => 'int!', 'offset' => 'int!', 'fromDate' => 'string!', 'toDate' => 'string!', 'pipelineId' => 'string!', 'dealId' => 'string!'],
    ],
    'crm.failReasons.listFailReasons' => [
        'method' => 'GET',
        'path'   => '/crm/v1/pipelines/{pipelineId}/fail-reasons',
        'params' => ['pipelineId' => 'string!'],
    ],
    'crm.failReasons.updateFailReason' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/pipelines/{pipelineId}/fail-reasons/{reasonId}',
        'params' => ['pipelineId' => 'string!', 'reasonId' => 'string!'],
    ],
    'crm.managerSettings.createManagerSettings' => [
        'method' => 'POST',
        'path'   => '/crm/v1/manager-settings',
        'params' => [],
    ],
    'crm.managerSettings.deleteManagerSettings' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/manager-settings/{id}',
        'params' => ['id' => 'int!'],
    ],
    'crm.managerSettings.getManagerSettingsBySection' => [
        'method' => 'GET',
        'path'   => '/crm/v1/manager-settings/{id}',
        'params' => ['id' => 'int!'],
    ],
    'crm.managerSettings.listManagerSettingSections' => [
        'method' => 'GET',
        'path'   => '/crm/v1/manager-settings/sections',
        'params' => [],
    ],
    'crm.managerSettings.listManagerSettings' => [
        'method' => 'GET',
        'path'   => '/crm/v1/manager-settings/managers',
        'params' => [],
    ],
    'crm.managerSettings.updateManagerSettings' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/manager-settings/{id}',
        'params' => ['id' => 'int!'],
    ],
    'crm.messengerTypes.listMessengerTypes' => [
        'method' => 'GET',
        'path'   => '/crm/v1/messenger-types',
        'params' => [],
    ],
    'crm.payments.approvePayment' => [
        'method' => 'POST',
        'path'   => '/crm/v1/payments/{paymentId}/approve',
        'params' => ['paymentId' => 'string!'],
    ],
    'crm.payments.cancelPayment' => [
        'method' => 'POST',
        'path'   => '/crm/v1/payments/{paymentId}/cancel',
        'params' => ['paymentId' => 'string!'],
    ],
    'crm.payments.createPayment' => [
        'method' => 'POST',
        'path'   => '/crm/v1/payments',
        'params' => [],
    ],
    'crm.payments.generateContactPaymentLink' => [
        'method' => 'POST',
        'path'   => '/crm/v1/payments/contact-generate-payment-link',
        'params' => [],
    ],
    'crm.payments.generateDealPaymentLink' => [
        'method' => 'POST',
        'path'   => '/crm/v1/payments/deal-generate-payment-link',
        'params' => [],
    ],
    'crm.payments.listContactPayments' => [
        'method' => 'GET',
        'path'   => '/crm/v1/payments/contacts/{contactId}',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.payments.listDealPayments' => [
        'method' => 'GET',
        'path'   => '/crm/v1/payments/deals/{dealId}',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.payments.listPaymentMethods' => [
        'method' => 'GET',
        'path'   => '/crm/v1/payments/user-payment-methods',
        'params' => [],
    ],
    'crm.payments.listPayments' => [
        'method' => 'GET',
        'path'   => '/crm/v1/payments/all',
        'params' => [],
    ],
    'crm.pipelineSteps.createPipelineStep' => [
        'method' => 'POST',
        'path'   => '/crm/v1/pipelines/{pipelineId}/steps',
        'params' => ['pipelineId' => 'string!'],
    ],
    'crm.pipelineSteps.deletePipelineStep' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/pipelines/{pipelineId}/steps/{stepId}',
        'params' => ['pipelineId' => 'string!', 'stepId' => 'string!'],
    ],
    'crm.pipelineSteps.listPipelineSteps' => [
        'method' => 'GET',
        'path'   => '/crm/v1/pipelines/{pipelineId}/steps',
        'params' => ['pipelineId' => 'string!'],
    ],
    'crm.pipelineSteps.updatePipelineStep' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/pipelines/{pipelineId}/steps/{stepId}',
        'params' => ['pipelineId' => 'string!', 'stepId' => 'string!'],
    ],
    'crm.pipelines.createPipeline' => [
        'method' => 'POST',
        'path'   => '/crm/v1/pipelines',
        'params' => [],
    ],
    'crm.pipelines.getPipeline' => [
        'method' => 'GET',
        'path'   => '/crm/v1/pipelines/{pipelineId}',
        'params' => ['pipelineId' => 'string!'],
    ],
    'crm.pipelines.listPipelines' => [
        'method' => 'GET',
        'path'   => '/crm/v1/pipelines',
        'params' => [],
    ],
    'crm.pipelines.updatePipeline' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/pipelines/{pipelineId}',
        'params' => ['pipelineId' => 'string!'],
    ],
    'crm.productCategories.createProductCategory' => [
        'method' => 'POST',
        'path'   => '/crm/v1/products/categories',
        'params' => [],
    ],
    'crm.productCategories.deleteProductCategory' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/products/categories/{categoryId}',
        'params' => ['categoryId' => 'string!'],
    ],
    'crm.productCategories.listProductCategories' => [
        'method' => 'GET',
        'path'   => '/crm/v1/products/categories',
        'params' => [],
    ],
    'crm.productCategories.updateProductCategory' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/products/categories/{categoryId}',
        'params' => ['categoryId' => 'string!'],
    ],
    'crm.products.addProductSections' => [
        'method' => 'POST',
        'path'   => '/crm/v1/products/{productId}/sections',
        'params' => ['productId' => 'string!'],
    ],
    'crm.products.createProduct' => [
        'method' => 'POST',
        'path'   => '/crm/v1/products',
        'params' => [],
    ],
    'crm.products.deleteProduct' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/products/{productId}',
        'params' => ['productId' => 'string!'],
    ],
    'crm.products.deleteProductSection' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/products/{productId}/sections/{sectionId}',
        'params' => ['sectionId' => 'int!', 'productId' => 'string!'],
    ],
    'crm.products.getProduct' => [
        'method' => 'GET',
        'path'   => '/crm/v1/products/{productId}',
        'params' => ['productId' => 'string!'],
    ],
    'crm.products.searchProducts' => [
        'method' => 'POST',
        'path'   => '/crm/v1/products/all',
        'params' => [],
    ],
    'crm.products.updateProduct' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/products/{productId}',
        'params' => ['productId' => 'string!'],
    ],
    'crm.products.updateProductPrices' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/products/{productId}/prices',
        'params' => ['productId' => 'string!'],
    ],
    'crm.products.updateProductSections' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/products/{productId}/sections',
        'params' => ['productId' => 'string!'],
    ],
    'crm.tags.attachTagToContact' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contact-tags/{tagId}/contact/{contactId}',
        'params' => ['tagId' => 'string!', 'contactId' => 'string!'],
    ],
    'crm.tags.createContactTag' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contact-tags',
        'params' => [],
    ],
    'crm.tags.createTaskTag' => [
        'method' => 'POST',
        'path'   => '/crm/v1/task-tags',
        'params' => [],
    ],
    'crm.tags.deleteContactTag' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/contact-tags/{tagId}',
        'params' => ['tagId' => 'string!'],
    ],
    'crm.tags.deleteTaskTag' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/task-tags/{tagId}',
        'params' => ['tagId' => 'string!'],
    ],
    'crm.tags.detachTagFromContact' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/contact-tags/{tagId}/contact/{contactId}',
        'params' => ['tagId' => 'string!', 'contactId' => 'string!'],
    ],
    'crm.tags.detachTagFromTask' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/task-tags/{tagId}/task/{taskId}',
        'params' => ['tagId' => 'string!', 'taskId' => 'string!'],
    ],
    'crm.tags.listContactTags' => [
        'method' => 'GET',
        'path'   => '/crm/v1/contact-tags',
        'params' => ['name' => 'string', 'search' => 'string'],
    ],
    'crm.tags.listTaskTags' => [
        'method' => 'GET',
        'path'   => '/crm/v1/task-tags',
        'params' => ['name' => 'string', 'search' => 'string'],
    ],
    'crm.tags.updateContactTag' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/contact-tags/{tagId}',
        'params' => ['tagId' => 'string!'],
    ],
    'crm.tags.updateTaskTag' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/task-tags/{tagId}',
        'params' => ['tagId' => 'string!'],
    ],
    'crm.taskChecklists.changeChecklistItemOrder' => [
        'method' => 'POST',
        'path'   => '/crm/v1/checklists/{checklistId}/items/{itemId}',
        'params' => ['checklistId' => 'string!', 'itemId' => 'string!'],
    ],
    'crm.taskChecklists.createChecklistItem' => [
        'method' => 'POST',
        'path'   => '/crm/v1/checklists/{checklistId}/items',
        'params' => ['checklistId' => 'string!'],
    ],
    'crm.taskChecklists.createTaskChecklist' => [
        'method' => 'POST',
        'path'   => '/crm/v1/tasks/{taskId}/checklists/single',
        'params' => ['taskId' => 'string!'],
    ],
    'crm.taskChecklists.createTaskChecklists' => [
        'method' => 'POST',
        'path'   => '/crm/v1/tasks/{taskId}/checklists',
        'params' => ['taskId' => 'string!'],
    ],
    'crm.taskChecklists.deleteChecklistItem' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/checklists/{checklistId}/items/{itemId}',
        'params' => ['checklistId' => 'string!', 'itemId' => 'string!'],
    ],
    'crm.taskChecklists.deleteTaskChecklist' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/tasks/{taskId}/checklists/{checklistId}',
        'params' => ['taskId' => 'string!', 'checklistId' => 'string!'],
    ],
    'crm.taskChecklists.listTaskChecklists' => [
        'method' => 'GET',
        'path'   => '/crm/v1/tasks/{taskId}/checklists',
        'params' => ['taskId' => 'string!'],
    ],
    'crm.taskChecklists.updateChecklistItem' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/checklists/{checklistId}/items/{itemId}',
        'params' => ['checklistId' => 'string!', 'itemId' => 'string!'],
    ],
    'crm.taskChecklists.updateTaskChecklist' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/tasks/{taskId}/checklists/{checklistId}/single',
        'params' => ['taskId' => 'string!', 'checklistId' => 'string!'],
    ],
    'crm.taskChecklists.updateTaskChecklists' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/tasks/{taskId}/checklists',
        'params' => ['taskId' => 'string!'],
    ],
    'crm.tasks.attachEntitiesToTask' => [
        'method' => 'POST',
        'path'   => '/crm/v1/tasks/{taskId}/entity-attach',
        'params' => ['taskId' => 'string!'],
    ],
    'crm.tasks.changeTaskOrder' => [
        'method' => 'POST',
        'path'   => '/crm/v1/tasks/{taskId}/steps/{stepId}/order',
        'params' => ['taskId' => 'string!', 'stepId' => 'string!'],
    ],
    'crm.tasks.createTask' => [
        'method' => 'POST',
        'path'   => '/crm/v1/tasks',
        'params' => [],
    ],
    'crm.tasks.deleteTask' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/tasks/{taskId}',
        'params' => ['taskId' => 'string!'],
    ],
    'crm.tasks.deleteTaskAttributeValue' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/{boardId}/attributes/{attributeId}/values/{valueId}',
        'params' => ['boardId' => 'string!', 'attributeId' => 'string!', 'valueId' => 'string!'],
    ],
    'crm.tasks.detachContactFromTask' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/task-contacts/{taskId}/contact/{contactId}',
        'params' => ['taskId' => 'string!', 'contactId' => 'string!'],
    ],
    'crm.tasks.detachDealFromTask' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/task-deals/{taskId}/deal/{dealId}',
        'params' => ['taskId' => 'string!', 'dealId' => 'string!'],
    ],
    'crm.tasks.detachTaskFromTask' => [
        'method' => 'DELETE',
        'path'   => '/crm/v1/task-to-task/{taskHeadId}/task/{taskId}',
        'params' => ['taskHeadId' => 'int!', 'taskId' => 'string!'],
    ],
    'crm.tasks.getTask' => [
        'method' => 'GET',
        'path'   => '/crm/v1/tasks/{taskId}',
        'params' => ['taskId' => 'string!'],
    ],
    'crm.tasks.getTaskHistory' => [
        'method' => 'GET',
        'path'   => '/crm/v1/tasks/{taskId}/history',
        'params' => ['fromDate' => 'string!', 'toDate' => 'string!', 'taskId' => 'string!'],
    ],
    'crm.tasks.searchTasks' => [
        'method' => 'POST',
        'path'   => '/crm/v1/tasks/list',
        'params' => [],
    ],
    'crm.tasks.setTaskAttributeValue' => [
        'method' => 'POST',
        'path'   => '/crm/v1/tasks/{taskId}/attributes',
        'params' => ['taskId' => 'string!'],
    ],
    'crm.tasks.setTaskParent' => [
        'method' => 'POST',
        'path'   => '/crm/v1/tasks/{taskId}/parent',
        'params' => ['taskId' => 'string!'],
    ],
    'crm.tasks.updateTask' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/tasks/{taskId}',
        'params' => ['taskId' => 'string!'],
    ],
    'crm.tasks.updateTaskAttributeValue' => [
        'method' => 'PUT',
        'path'   => '/crm/v1/{boardId}/attributes/{attributeId}/values/{valueId}',
        'params' => ['boardId' => 'string!', 'attributeId' => 'string!', 'valueId' => 'string!'],
    ],
    'crm.telephony.attachCallToDeal' => [
        'method' => 'POST',
        'path'   => '/crm/v1/deals/{dealId}/attach-call',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.telephony.listCalls' => [
        'method' => 'POST',
        'path'   => '/crm/v1/telephony/calls/get-list',
        'params' => [],
    ],
    'crm.telephony.listContactCalls' => [
        'method' => 'POST',
        'path'   => '/crm/v1/contacts/{contactId}/get-calls',
        'params' => ['contactId' => 'string!'],
    ],
    'crm.telephony.listDealCalls' => [
        'method' => 'POST',
        'path'   => '/crm/v1/deals/{dealId}/get-calls',
        'params' => ['dealId' => 'string!'],
    ],
    'crm.users.listUsers' => [
        'method' => 'GET',
        'path'   => '/crm/v1/users',
        'params' => [],
    ],
];
