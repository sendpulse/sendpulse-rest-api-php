<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetContactAttributesById;
use Sendpulse\RestApi\Generated\Operation\Crm\AddContactAttributeValue;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateContactAttributeValue;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteContactAttributeValue;
use Sendpulse\RestApi\Service\AbstractService;

final class ContactAttributesValueResource extends AbstractService
{
    public function getContactAttributesById(int $contactId): array
    {
        return $this->send(GetContactAttributesById::build(
            contactId: $contactId,
        ));
    }

    public function addContactAttributeValue(int $contactId, array $body = []): array
    {
        return $this->send(AddContactAttributeValue::build(
            contactId: $contactId,
            body: $body,
        ));
    }

    public function updateContactAttributeValue(int $contactId, int $attributeId, array $body = []): array
    {
        return $this->send(UpdateContactAttributeValue::build(
            contactId: $contactId,
            attributeId: $attributeId,
            body: $body,
        ));
    }

    public function deleteContactAttributeValue(int $contactId, int $attributeId): array
    {
        return $this->send(DeleteContactAttributeValue::build(
            contactId: $contactId,
            attributeId: $attributeId,
        ));
    }
}