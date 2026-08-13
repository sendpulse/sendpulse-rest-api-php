<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetTaskHistory;
use Sendpulse\RestApi\Service\AbstractService;

final class TaskHistoryResource extends AbstractService
{
    public function getTaskHistory(int $taskId, string $fromDate, string $toDate): array
    {
        return $this->send(GetTaskHistory::build(
            taskId: $taskId,
            fromDate: $fromDate,
            toDate: $toDate,
        ));
    }
}