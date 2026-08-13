<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetDealContacts;
use Sendpulse\RestApi\Generated\Operation\Crm\AddContactToDeal;
use Sendpulse\RestApi\Generated\Operation\Crm\RemoveDealContact;
use Sendpulse\RestApi\Service\AbstractService;

final class DealContactsResource extends AbstractService
{
    public function getDealContacts(int $dealId): array
    {
        return $this->send(GetDealContacts::build(
            dealId: $dealId,
        ));
    }

    public function addContactToDeal(int $dealId, int $contactId): array
    {
        return $this->send(AddContactToDeal::build(
            dealId: $dealId,
            contactId: $contactId,
        ));
    }

    public function removeDealContact(int $dealId, int $contactId): array
    {
        return $this->send(RemoveDealContact::build(
            dealId: $dealId,
            contactId: $contactId,
        ));
    }
}