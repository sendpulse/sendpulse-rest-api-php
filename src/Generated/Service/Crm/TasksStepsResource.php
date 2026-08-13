<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\CreateBoardSteps;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateBoardStep;
use Sendpulse\RestApi\Service\AbstractService;

final class TasksStepsResource extends AbstractService
{
    public function createBoardSteps(int $boardId, array $body = []): array
    {
        return $this->send(CreateBoardSteps::build(
            boardId: $boardId,
            body: $body,
        ));
    }

    public function updateBoardStep(int $boardId, int $stepId, array $body = []): array
    {
        return $this->send(UpdateBoardStep::build(
            boardId: $boardId,
            stepId: $stepId,
            body: $body,
        ));
    }
}