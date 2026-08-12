<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\ListTasks;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateTask;
use Sendpulse\RestApi\Generated\Operation\Crm\GetTaskRepeatTemplates;
use Sendpulse\RestApi\Generated\Operation\Crm\GetTaskById;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateTaskById;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteTask;
use Sendpulse\RestApi\Generated\Operation\Crm\SetTaskParent;
use Sendpulse\RestApi\Generated\Operation\Crm\ChangeTaskStepOrder;
use Sendpulse\RestApi\Service\AbstractService;

final class TasksResource extends AbstractService
{
    public function listTasks(array $body = []): array
    {
        return $this->send(ListTasks::build(
            body: $body,
        ));
    }

    public function createTask(array $body = []): array
    {
        return $this->send(CreateTask::build(
            body: $body,
        ));
    }

    public function getTaskRepeatTemplates(): array
    {
        return $this->send(GetTaskRepeatTemplates::build());
    }

    public function getTaskById(int $taskId): array
    {
        return $this->send(GetTaskById::build(
            taskId: $taskId,
        ));
    }

    public function updateTaskById(int $taskId, array $body = []): array
    {
        return $this->send(UpdateTaskById::build(
            taskId: $taskId,
            body: $body,
        ));
    }

    public function deleteTask(int $taskId): array
    {
        return $this->send(DeleteTask::build(
            taskId: $taskId,
        ));
    }

    public function setTaskParent(int $taskId, array $body = []): array
    {
        return $this->send(SetTaskParent::build(
            taskId: $taskId,
            body: $body,
        ));
    }

    public function changeTaskStepOrder(int $taskId, int $stepId, array $body = []): array
    {
        return $this->send(ChangeTaskStepOrder::build(
            taskId: $taskId,
            stepId: $stepId,
            body: $body,
        ));
    }
}