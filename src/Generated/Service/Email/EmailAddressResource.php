<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Email;

use Sendpulse\RestApi\Generated\Operation\Email\UpdateContactVariables;
use Sendpulse\RestApi\Generated\Model\Email\ResultTrue;
use Sendpulse\RestApi\Generated\Operation\Email\GetEmailInfo;
use Sendpulse\RestApi\Generated\Model\Email\EmailAcrossBooks;
use Sendpulse\RestApi\Generated\Operation\Email\DeleteEmailGlobally;
use Sendpulse\RestApi\Generated\Operation\Email\GetEmailDetails;
use Sendpulse\RestApi\Generated\Model\Email\EmailDetails;
use Sendpulse\RestApi\Generated\Operation\Email\GetMultipleEmailsInfo;
use Sendpulse\RestApi\Generated\Operation\Email\GetEmailCampaignStats;
use Sendpulse\RestApi\Generated\Model\Email\SubscriberStats;
use Sendpulse\RestApi\Generated\Operation\Email\GetEmailCampaignInfo;
use Sendpulse\RestApi\Generated\Model\Email\EmailCampaignDeliveryInfo;
use Sendpulse\RestApi\Generated\Operation\Email\GetEmailFromList;
use Sendpulse\RestApi\Generated\Model\Email\ListContactInfo;
use Sendpulse\RestApi\Generated\Operation\Email\GetMultipleEmailsCampaignStats;
use Sendpulse\RestApi\Service\AbstractService;

final class EmailAddressResource extends AbstractService
{
    public function updateContactVariables(int $id, array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(UpdateContactVariables::build(
            id: $id,
            body: $body,
        )));
    }

    /**
     * @return EmailAcrossBooks[]
     */
    public function getEmailInfo(string $email): array
    {
        return array_map(
            static fn(array $item) => EmailAcrossBooks::fromArray($item),
            $this->send(GetEmailInfo::build(
            email: $email,
        ))
        );
    }

    public function deleteEmailGlobally(string $email): ResultTrue
    {
        return ResultTrue::fromArray($this->send(DeleteEmailGlobally::build(
            email: $email,
        )));
    }

    /**
     * @return EmailDetails[]
     */
    public function getEmailDetails(string $email): array
    {
        return array_map(
            static fn(array $item) => EmailDetails::fromArray($item),
            $this->send(GetEmailDetails::build(
            email: $email,
        ))
        );
    }

    public function getMultipleEmailsInfo(array $body = []): array
    {
        return $this->send(GetMultipleEmailsInfo::build(
            body: $body,
        ));
    }

    public function getEmailCampaignStats(string $email): SubscriberStats
    {
        return SubscriberStats::fromArray($this->send(GetEmailCampaignStats::build(
            email: $email,
        )));
    }

    public function getEmailCampaignInfo(int $id, string $email): EmailCampaignDeliveryInfo
    {
        return EmailCampaignDeliveryInfo::fromArray($this->send(GetEmailCampaignInfo::build(
            id: $id,
            email: $email,
        )));
    }

    public function getEmailFromList(int $id, string $email): ListContactInfo
    {
        return ListContactInfo::fromArray($this->send(GetEmailFromList::build(
            id: $id,
            email: $email,
        )));
    }

    public function getMultipleEmailsCampaignStats(array $body = []): array
    {
        return $this->send(GetMultipleEmailsCampaignStats::build(
            body: $body,
        ));
    }
}