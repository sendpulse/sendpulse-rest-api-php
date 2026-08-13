<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetCompanyHistory;
use Sendpulse\RestApi\Service\AbstractService;

final class CompanyHistoryResource extends AbstractService
{
    public function getCompanyHistory(?string $dateFrom = null, ?string $dateTo = null, ?int $limit = null, ?int $offset = null): array
    {
        return $this->send(GetCompanyHistory::build(
            dateFrom: $dateFrom,
            dateTo: $dateTo,
            limit: $limit,
            offset: $offset,
        ));
    }
}