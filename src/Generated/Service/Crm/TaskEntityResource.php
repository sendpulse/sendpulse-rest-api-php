<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\DetachContactFromTask;
use Sendpulse\RestApi\Generated\Operation\Crm\DetachDealFromTask;
use Sendpulse\RestApi\Generated\Operation\Crm\DetachTaskFromTask;
use Sendpulse\RestApi\Generated\Operation\Crm\AttachEntitiesToTask;
use Sendpulse\RestApi\Service\AbstractService;

final class TaskEntityResource extends AbstractService
{
    public function detachContactFromTask(int $taskId, int $contactId): array
    {
        return $this->send(DetachContactFromTask::build(
            taskId: $taskId,
            contactId: $contactId,
        ));
    }

    public function detachDealFromTask(int $taskId, int $dealId): array
    {
        return $this->send(DetachDealFromTask::build(
            taskId: $taskId,
            dealId: $dealId,
        ));
    }

    public function detachTaskFromTask(int $taskHeadId, int $taskId): array
    {
        return $this->send(DetachTaskFromTask::build(
            taskHeadId: $taskHeadId,
            taskId: $taskId,
        ));
    }

    public function attachEntitiesToTask(int $taskId, array $body = []): array
    {
        return $this->send(AttachEntitiesToTask::build(
            taskId: $taskId,
            body: $body,
        ));
    }
}