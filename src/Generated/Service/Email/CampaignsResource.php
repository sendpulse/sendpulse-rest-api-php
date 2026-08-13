<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Email;

use Sendpulse\RestApi\Generated\Operation\Email\GetCampaigns;
use Sendpulse\RestApi\Generated\Model\Email\CampaignSummary;
use Sendpulse\RestApi\Generated\Operation\Email\CreateCampaign;
use Sendpulse\RestApi\Generated\Model\Email\CampaignCreateResponse;
use Sendpulse\RestApi\Generated\Operation\Email\GetCampaignById;
use Sendpulse\RestApi\Generated\Model\Email\CampaignDetails;
use Sendpulse\RestApi\Generated\Operation\Email\UpdateCampaign;
use Sendpulse\RestApi\Generated\Model\Email\ResultTrueWithId;
use Sendpulse\RestApi\Generated\Operation\Email\CancelCampaign;
use Sendpulse\RestApi\Generated\Model\Email\ResultTrue;
use Sendpulse\RestApi\Generated\Operation\Email\GetCampaignCountryStats;
use Sendpulse\RestApi\Generated\Operation\Email\GetCampaignReferralStats;
use Sendpulse\RestApi\Generated\Model\Email\ReferralStat;
use Sendpulse\RestApi\Generated\Operation\Email\GetCampaignsByList;
use Sendpulse\RestApi\Generated\Model\Email\CampaignByListSummary;
use Sendpulse\RestApi\Service\AbstractService;

final class CampaignsResource extends AbstractService
{
    /**
     * @param array<mixed>|null $status
     * @return CampaignSummary[]
     */
    public function getCampaigns(?int $limit = null, ?int $offset = null, ?string $order = null, ?array $status = null, ?bool $planed = null): array
    {
        return array_map(
            static fn(array $item) => CampaignSummary::fromArray($item),
            $this->send(GetCampaigns::build(
            limit: $limit,
            offset: $offset,
            order: $order,
            status: $status,
            planed: $planed,
        ))
        );
    }

    public function createCampaign(array $body = []): CampaignCreateResponse
    {
        return CampaignCreateResponse::fromArray($this->send(CreateCampaign::build(
            body: $body,
        )));
    }

    public function getCampaignById(int $id): CampaignDetails
    {
        return CampaignDetails::fromArray($this->send(GetCampaignById::build(
            id: $id,
        )));
    }

    public function updateCampaign(int $id, array $body = []): ResultTrueWithId
    {
        return ResultTrueWithId::fromArray($this->send(UpdateCampaign::build(
            id: $id,
            body: $body,
        )));
    }

    public function cancelCampaign(int $id): ResultTrue
    {
        return ResultTrue::fromArray($this->send(CancelCampaign::build(
            id: $id,
        )));
    }

    public function getCampaignCountryStats(int $id): array
    {
        return $this->send(GetCampaignCountryStats::build(
            id: $id,
        ));
    }

    /**
     * @return ReferralStat[]
     */
    public function getCampaignReferralStats(int $id): array
    {
        return array_map(
            static fn(array $item) => ReferralStat::fromArray($item),
            $this->send(GetCampaignReferralStats::build(
            id: $id,
        ))
        );
    }

    /**
     * @return CampaignByListSummary[]
     */
    public function getCampaignsByList(int $id, ?int $limit = null, ?int $offset = null): array
    {
        return array_map(
            static fn(array $item) => CampaignByListSummary::fromArray($item),
            $this->send(GetCampaignsByList::build(
            id: $id,
            limit: $limit,
            offset: $offset,
        ))
        );
    }
}