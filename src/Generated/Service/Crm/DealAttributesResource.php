<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\ListPipelineAttributes;
use Sendpulse\RestApi\Generated\Operation\Crm\CreatePipelineAttribute;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdatePipelineAttribute;
use Sendpulse\RestApi\Generated\Operation\Crm\DeletePipelineAttribute;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteDealAttribute;
use Sendpulse\RestApi\Service\AbstractService;

final class DealAttributesResource extends AbstractService
{
    public function listPipelineAttributes(int $pipelineId): array
    {
        return $this->send(ListPipelineAttributes::build(
            pipelineId: $pipelineId,
        ));
    }

    public function createPipelineAttribute(int $pipelineId, array $body = []): array
    {
        return $this->send(CreatePipelineAttribute::build(
            pipelineId: $pipelineId,
            body: $body,
        ));
    }

    public function updatePipelineAttribute(int $pipelineId, int $attributeId, array $body = []): array
    {
        return $this->send(UpdatePipelineAttribute::build(
            pipelineId: $pipelineId,
            attributeId: $attributeId,
            body: $body,
        ));
    }

    public function deletePipelineAttribute(int $pipelineId, int $attributeId): array
    {
        return $this->send(DeletePipelineAttribute::build(
            pipelineId: $pipelineId,
            attributeId: $attributeId,
        ));
    }

    public function deleteDealAttribute(int $dealId, int $attributeId): array
    {
        return $this->send(DeleteDealAttribute::build(
            dealId: $dealId,
            attributeId: $attributeId,
        ));
    }
}