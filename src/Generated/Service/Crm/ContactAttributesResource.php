<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetContactAttributes;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateContactAttribute;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateContactAttribute;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteContactAttribute;
use Sendpulse\RestApi\Service\AbstractService;

final class ContactAttributesResource extends AbstractService
{
    public function getContactAttributes(): array
    {
        return $this->send(GetContactAttributes::build());
    }

    public function createContactAttribute(array $body = []): array
    {
        return $this->send(CreateContactAttribute::build(
            body: $body,
        ));
    }

    public function updateContactAttribute(int $attributeId, array $body = []): array
    {
        return $this->send(UpdateContactAttribute::build(
            attributeId: $attributeId,
            body: $body,
        ));
    }

    public function deleteContactAttribute(int $attributeId): array
    {
        return $this->send(DeleteContactAttribute::build(
            attributeId: $attributeId,
        ));
    }
}