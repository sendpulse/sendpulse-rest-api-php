<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetPipelineSteps;
use Sendpulse\RestApi\Generated\Operation\Crm\CreatePipelineStep;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdatePipelineStep;
use Sendpulse\RestApi\Generated\Operation\Crm\DeletePipelineStep;
use Sendpulse\RestApi\Service\AbstractService;

final class PipelineStepsResource extends AbstractService
{
    public function getPipelineSteps(int $pipelineId): array
    {
        return $this->send(GetPipelineSteps::build(
            pipelineId: $pipelineId,
        ));
    }

    public function createPipelineStep(int $pipelineId, array $body = []): array
    {
        return $this->send(CreatePipelineStep::build(
            pipelineId: $pipelineId,
            body: $body,
        ));
    }

    public function updatePipelineStep(int $pipelineId, int $stepId, array $body = []): array
    {
        return $this->send(UpdatePipelineStep::build(
            pipelineId: $pipelineId,
            stepId: $stepId,
            body: $body,
        ));
    }

    public function deletePipelineStep(int $pipelineId, int $stepId): array
    {
        return $this->send(DeletePipelineStep::build(
            pipelineId: $pipelineId,
            stepId: $stepId,
        ));
    }
}