<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\CreateTaskChecklist;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateTaskChecklistSingle;
use Sendpulse\RestApi\Generated\Operation\Crm\GetTaskChecklists;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateTaskChecklists;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateTaskChecklists;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteTaskChecklist;
use Sendpulse\RestApi\Service\AbstractService;

final class TaskChecklistResource extends AbstractService
{
    public function createTaskChecklist(int $taskId, array $body = []): array
    {
        return $this->send(CreateTaskChecklist::build(
            taskId: $taskId,
            body: $body,
        ));
    }

    public function updateTaskChecklistSingle(int $taskId, int $checklistId, array $body = []): array
    {
        return $this->send(UpdateTaskChecklistSingle::build(
            taskId: $taskId,
            checklistId: $checklistId,
            body: $body,
        ));
    }

    public function getTaskChecklists(int $taskId): array
    {
        return $this->send(GetTaskChecklists::build(
            taskId: $taskId,
        ));
    }

    public function createTaskChecklists(int $taskId, array $body = []): array
    {
        return $this->send(CreateTaskChecklists::build(
            taskId: $taskId,
            body: $body,
        ));
    }

    public function updateTaskChecklists(int $taskId, array $body = []): array
    {
        return $this->send(UpdateTaskChecklists::build(
            taskId: $taskId,
            body: $body,
        ));
    }

    public function deleteTaskChecklist(int $taskId, int $checklistId): array
    {
        return $this->send(DeleteTaskChecklist::build(
            taskId: $taskId,
            checklistId: $checklistId,
        ));
    }
}