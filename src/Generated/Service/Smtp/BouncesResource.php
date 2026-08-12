<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Smtp;

use Sendpulse\RestApi\Generated\Operation\Smtp\GetBounceReport;
use Sendpulse\RestApi\Generated\Model\Smtp\BounceReport;
use Sendpulse\RestApi\Generated\Operation\Smtp\GetSmtpBouncesTotal;
use Sendpulse\RestApi\Generated\Model\Smtp\TotalCount;
use Sendpulse\RestApi\Service\AbstractService;

final class BouncesResource extends AbstractService
{
    public function getBounceReport(?string $date = null, ?int $limit = null, ?int $offset = null): BounceReport
    {
        return BounceReport::fromArray($this->send(GetBounceReport::build(
            date: $date,
            limit: $limit,
            offset: $offset,
        )));
    }

    public function getSmtpBouncesTotal(): TotalCount
    {
        return TotalCount::fromArray($this->send(GetSmtpBouncesTotal::build()));
    }
}