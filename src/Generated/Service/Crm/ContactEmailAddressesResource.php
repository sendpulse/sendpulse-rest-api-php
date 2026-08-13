<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\AddContactEmails;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateContactEmail;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteContactEmail;
use Sendpulse\RestApi\Service\AbstractService;

final class ContactEmailAddressesResource extends AbstractService
{
    public function addContactEmails(int $contactId, array $body = []): array
    {
        return $this->send(AddContactEmails::build(
            contactId: $contactId,
            body: $body,
        ));
    }

    public function updateContactEmail(int $contactId, int $emailId, array $body = []): array
    {
        return $this->send(UpdateContactEmail::build(
            contactId: $contactId,
            emailId: $emailId,
            body: $body,
        ));
    }

    public function deleteContactEmail(int $contactId, int $emailId): array
    {
        return $this->send(DeleteContactEmail::build(
            contactId: $contactId,
            emailId: $emailId,
        ));
    }
}