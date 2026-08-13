<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Sms;

use Sendpulse\RestApi\Generated\Operation\Sms\CreateSmsCampaign;
use Sendpulse\RestApi\Generated\Model\Sms\CampaignCreation;
use Sendpulse\RestApi\Generated\Operation\Sms\DeleteSmsCampaign;
use Sendpulse\RestApi\Generated\Model\Sms\ResultTrue;
use Sendpulse\RestApi\Generated\Operation\Sms\SendSmsToNumbers;
use Sendpulse\RestApi\Generated\Model\Sms\CampaignDelivery;
use Sendpulse\RestApi\Generated\Operation\Sms\GetSmsCampaigns;
use Sendpulse\RestApi\Generated\Operation\Sms\GetSmsCampaignInfo;
use Sendpulse\RestApi\Generated\Operation\Sms\CancelSmsCampaign;
use Sendpulse\RestApi\Generated\Operation\Sms\CalculateSmsCost;
use Sendpulse\RestApi\Generated\Model\Sms\CostEstimate;
use Sendpulse\RestApi\Service\AbstractService;

final class CampaignsResource extends AbstractService
{
    public function createSmsCampaign(array $body = []): CampaignCreation
    {
        return CampaignCreation::fromArray($this->send(CreateSmsCampaign::build(
            body: $body,
        )));
    }

    public function deleteSmsCampaign(array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(DeleteSmsCampaign::build(
            body: $body,
        )));
    }

    public function sendSmsToNumbers(array $body = []): CampaignDelivery
    {
        return CampaignDelivery::fromArray($this->send(SendSmsToNumbers::build(
            body: $body,
        )));
    }

    public function getSmsCampaigns(?string $dateFrom = null, ?string $dateTo = null): array
    {
        return $this->send(GetSmsCampaigns::build(
            dateFrom: $dateFrom,
            dateTo: $dateTo,
        ));
    }

    public function getSmsCampaignInfo(int $id): array
    {
        return $this->send(GetSmsCampaignInfo::build(
            id: $id,
        ));
    }

    public function cancelSmsCampaign(int $id): ResultTrue
    {
        return ResultTrue::fromArray($this->send(CancelSmsCampaign::build(
            id: $id,
        )));
    }

    /**
     * @param array<mixed>|null $phones
     */
    public function calculateSmsCost(string $body, string $sender, ?int $addressBookId = null, ?array $phones = null, mixed $route = null): CostEstimate
    {
        return CostEstimate::fromArray($this->send(CalculateSmsCost::build(
            body: $body,
            sender: $sender,
            addressBookId: $addressBookId,
            phones: $phones,
            route: $route,
        )));
    }
}