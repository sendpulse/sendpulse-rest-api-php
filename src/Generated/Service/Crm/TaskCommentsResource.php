<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\AddTaskComment;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateTaskComment;
use Sendpulse\RestApi\Service\AbstractService;

final class TaskCommentsResource extends AbstractService
{
    public function addTaskComment(int $taskId, array $body = []): array
    {
        return $this->send(AddTaskComment::build(
            taskId: $taskId,
            body: $body,
        ));
    }

    public function updateTaskComment(int $taskId, int $commentId, array $body = []): array
    {
        return $this->send(UpdateTaskComment::build(
            taskId: $taskId,
            commentId: $commentId,
            body: $body,
        ));
    }
}