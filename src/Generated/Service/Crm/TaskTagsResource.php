<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\DetachTagFromTask;
use Sendpulse\RestApi\Generated\Operation\Crm\GetTaskTags;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateTaskTag;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateTaskTag;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteTaskTag;
use Sendpulse\RestApi\Service\AbstractService;

final class TaskTagsResource extends AbstractService
{
    public function detachTagFromTask(int $tagId, int $taskId): array
    {
        return $this->send(DetachTagFromTask::build(
            tagId: $tagId,
            taskId: $taskId,
        ));
    }

    public function getTaskTags(): array
    {
        return $this->send(GetTaskTags::build());
    }

    public function createTaskTag(array $body = []): array
    {
        return $this->send(CreateTaskTag::build(
            body: $body,
        ));
    }

    public function updateTaskTag(int $tagId, array $body = []): array
    {
        return $this->send(UpdateTaskTag::build(
            tagId: $tagId,
            body: $body,
        ));
    }

    public function deleteTaskTag(int $tagId): array
    {
        return $this->send(DeleteTaskTag::build(
            tagId: $tagId,
        ));
    }
}