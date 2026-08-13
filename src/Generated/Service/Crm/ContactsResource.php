<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetContactsList;
use Sendpulse\RestApi\Generated\Operation\Crm\GetContactListByEmail;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateContact;
use Sendpulse\RestApi\Generated\Operation\Crm\GetContactById;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateContact;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteContactById;
use Sendpulse\RestApi\Generated\Operation\Crm\GetContactDeals;
use Sendpulse\RestApi\Generated\Operation\Crm\AddContactComment;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateContactComment;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteContactComment;
use Sendpulse\RestApi\Generated\Operation\Crm\GetContactEduPayments;
use Sendpulse\RestApi\Generated\Operation\Crm\GetContactEduStatistic;
use Sendpulse\RestApi\Generated\Operation\Crm\GetContactByExternalId;
use Sendpulse\RestApi\Generated\Operation\Crm\GetContactByMessengerExternalId;
use Sendpulse\RestApi\Generated\Operation\Crm\AddContactCompanyRelation;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteContactCompanyRelation;
use Sendpulse\RestApi\Service\AbstractService;

final class ContactsResource extends AbstractService
{
    public function getContactsList(array $body = []): array
    {
        return $this->send(GetContactsList::build(
            body: $body,
        ));
    }

    public function getContactListByEmail(array $body = []): array
    {
        return $this->send(GetContactListByEmail::build(
            body: $body,
        ));
    }

    public function createContact(array $body = []): array
    {
        return $this->send(CreateContact::build(
            body: $body,
        ));
    }

    public function getContactById(int $contactId): array
    {
        return $this->send(GetContactById::build(
            contactId: $contactId,
        ));
    }

    public function updateContact(int $contactId, array $body = []): array
    {
        return $this->send(UpdateContact::build(
            contactId: $contactId,
            body: $body,
        ));
    }

    public function deleteContactById(int $contactId): array
    {
        return $this->send(DeleteContactById::build(
            contactId: $contactId,
        ));
    }

    public function getContactDeals(int $contactId): array
    {
        return $this->send(GetContactDeals::build(
            contactId: $contactId,
        ));
    }

    public function addContactComment(int $contactId, array $body = []): array
    {
        return $this->send(AddContactComment::build(
            contactId: $contactId,
            body: $body,
        ));
    }

    public function updateContactComment(int $contactId, int $commentId, array $body = []): array
    {
        return $this->send(UpdateContactComment::build(
            contactId: $contactId,
            commentId: $commentId,
            body: $body,
        ));
    }

    public function deleteContactComment(int $contactId, int $commentId): array
    {
        return $this->send(DeleteContactComment::build(
            contactId: $contactId,
            commentId: $commentId,
        ));
    }

    public function getContactEduPayments(int $contactId): array
    {
        return $this->send(GetContactEduPayments::build(
            contactId: $contactId,
        ));
    }

    public function getContactEduStatistic(int $contactId): array
    {
        return $this->send(GetContactEduStatistic::build(
            contactId: $contactId,
        ));
    }

    public function getContactByExternalId(int $externalContactId): array
    {
        return $this->send(GetContactByExternalId::build(
            externalContactId: $externalContactId,
        ));
    }

    public function getContactByMessengerExternalId(string $messengerContactId): array
    {
        return $this->send(GetContactByMessengerExternalId::build(
            messengerContactId: $messengerContactId,
        ));
    }

    public function addContactCompanyRelation(int $contactId, int $companyId): array
    {
        return $this->send(AddContactCompanyRelation::build(
            contactId: $contactId,
            companyId: $companyId,
        ));
    }

    public function deleteContactCompanyRelation(int $contactId, int $companyId): array
    {
        return $this->send(DeleteContactCompanyRelation::build(
            contactId: $contactId,
            companyId: $companyId,
        ));
    }
}