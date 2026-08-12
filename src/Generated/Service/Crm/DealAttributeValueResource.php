<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetDealAttributeValues;
use Sendpulse\RestApi\Generated\Operation\Crm\AddDealAttribute;
use Sendpulse\RestApi\Generated\Operation\Crm\ListDealAttributesByPipeline;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateDealAttributeValue;
use Sendpulse\RestApi\Service\AbstractService;

final class DealAttributeValueResource extends AbstractService
{
    public function getDealAttributeValues(int $dealId): array
    {
        return $this->send(GetDealAttributeValues::build(
            dealId: $dealId,
        ));
    }

    public function addDealAttribute(int $dealId, array $body = []): array
    {
        return $this->send(AddDealAttribute::build(
            dealId: $dealId,
            body: $body,
        ));
    }

    public function listDealAttributesByPipeline(int $pipelineId): array
    {
        return $this->send(ListDealAttributesByPipeline::build(
            pipelineId: $pipelineId,
        ));
    }

    public function updateDealAttributeValue(int $dealId, int $attributeId, array $body = []): array
    {
        return $this->send(UpdateDealAttributeValue::build(
            dealId: $dealId,
            attributeId: $attributeId,
            body: $body,
        ));
    }
}