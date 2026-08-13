<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\BatchStoreContactAttributeValues;
use Sendpulse\RestApi\Service\AbstractService;

final class ContactAttributesValuesResource extends AbstractService
{
    public function batchStoreContactAttributeValues(int $contactId, array $body = []): array
    {
        return $this->send(BatchStoreContactAttributeValues::build(
            contactId: $contactId,
            body: $body,
        ));
    }
}