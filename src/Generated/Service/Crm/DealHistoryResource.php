<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetDealHistory;
use Sendpulse\RestApi\Service\AbstractService;

final class DealHistoryResource extends AbstractService
{
    public function getDealHistory(int $dealId, string $fromDate, string $toDate): array
    {
        return $this->send(GetDealHistory::build(
            dealId: $dealId,
            fromDate: $fromDate,
            toDate: $toDate,
        ));
    }
}