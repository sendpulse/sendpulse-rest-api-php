<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\UpsertDealExpiration;
use Sendpulse\RestApi\Generated\Operation\Crm\RemoveDealExpiration;
use Sendpulse\RestApi\Service\AbstractService;

final class DealExpirationResource extends AbstractService
{
    public function upsertDealExpiration(int $dealId, array $body = []): array
    {
        return $this->send(UpsertDealExpiration::build(
            dealId: $dealId,
            body: $body,
        ));
    }

    public function removeDealExpiration(int $dealId): array
    {
        return $this->send(RemoveDealExpiration::build(
            dealId: $dealId,
        ));
    }
}