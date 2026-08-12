<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\AddContactPhone;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateContactPhone;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteContactPhone;
use Sendpulse\RestApi\Service\AbstractService;

final class ContactPhoneNumberResource extends AbstractService
{
    public function addContactPhone(int $contactId, array $body = []): array
    {
        return $this->send(AddContactPhone::build(
            contactId: $contactId,
            body: $body,
        ));
    }

    public function updateContactPhone(int $contactId, int $phoneId, array $body = []): array
    {
        return $this->send(UpdateContactPhone::build(
            contactId: $contactId,
            phoneId: $phoneId,
            body: $body,
        ));
    }

    public function deleteContactPhone(int $contactId, int $phoneId): array
    {
        return $this->send(DeleteContactPhone::build(
            contactId: $contactId,
            phoneId: $phoneId,
        ));
    }
}