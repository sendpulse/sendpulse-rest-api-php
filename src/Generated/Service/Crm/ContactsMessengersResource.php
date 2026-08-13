<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\AddContactMessenger;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateContactMessenger;
use Sendpulse\RestApi\Generated\Operation\Crm\RemoveContactMessenger;
use Sendpulse\RestApi\Service\AbstractService;

final class ContactsMessengersResource extends AbstractService
{
    public function addContactMessenger(int $contactId, array $body = []): array
    {
        return $this->send(AddContactMessenger::build(
            contactId: $contactId,
            body: $body,
        ));
    }

    public function updateContactMessenger(int $contactId, int $messengerId, array $body = []): array
    {
        return $this->send(UpdateContactMessenger::build(
            contactId: $contactId,
            messengerId: $messengerId,
            body: $body,
        ));
    }

    public function removeContactMessenger(int $contactId, int $messengerId): array
    {
        return $this->send(RemoveContactMessenger::build(
            contactId: $contactId,
            messengerId: $messengerId,
        ));
    }
}