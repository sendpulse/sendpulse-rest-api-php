<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetPipelines;
use Sendpulse\RestApi\Generated\Operation\Crm\CreatePipeline;
use Sendpulse\RestApi\Generated\Operation\Crm\GetPipelineById;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdatePipeline;
use Sendpulse\RestApi\Service\AbstractService;

final class PipelinesResource extends AbstractService
{
    public function getPipelines(): array
    {
        return $this->send(GetPipelines::build());
    }

    public function createPipeline(array $body = []): array
    {
        return $this->send(CreatePipeline::build(
            body: $body,
        ));
    }

    public function getPipelineById(int $pipelineId): array
    {
        return $this->send(GetPipelineById::build(
            pipelineId: $pipelineId,
        ));
    }

    public function updatePipeline(int $pipelineId, array $body = []): array
    {
        return $this->send(UpdatePipeline::build(
            pipelineId: $pipelineId,
            body: $body,
        ));
    }
}