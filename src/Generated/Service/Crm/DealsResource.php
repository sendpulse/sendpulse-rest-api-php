<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetDealsList;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateDeal;
use Sendpulse\RestApi\Generated\Operation\Crm\GetDeal;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateDealById;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteDeal;
use Sendpulse\RestApi\Generated\Operation\Crm\ChangeDealPipeline;
use Sendpulse\RestApi\Service\AbstractService;

final class DealsResource extends AbstractService
{
    public function getDealsList(array $body = []): array
    {
        return $this->send(GetDealsList::build(
            body: $body,
        ));
    }

    public function createDeal(array $body = []): array
    {
        return $this->send(CreateDeal::build(
            body: $body,
        ));
    }

    public function getDeal(int $dealId): array
    {
        return $this->send(GetDeal::build(
            dealId: $dealId,
        ));
    }

    public function updateDealById(int $dealId, array $body = []): array
    {
        return $this->send(UpdateDealById::build(
            dealId: $dealId,
            body: $body,
        ));
    }

    public function deleteDeal(int $dealId): array
    {
        return $this->send(DeleteDeal::build(
            dealId: $dealId,
        ));
    }

    public function changeDealPipeline(int $dealId, array $body = []): array
    {
        return $this->send(ChangeDealPipeline::build(
            dealId: $dealId,
            body: $body,
        ));
    }
}