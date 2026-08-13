<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service;

use Sendpulse\RestApi\Generated\Service\Email\MailingListsResource;
use Sendpulse\RestApi\Generated\Service\Email\EmailAddressResource;
use Sendpulse\RestApi\Generated\Service\Email\CampaignsResource;
use Sendpulse\RestApi\Generated\Service\Email\TemplatesResource;
use Sendpulse\RestApi\Generated\Service\Email\SendersResource;
use Sendpulse\RestApi\Generated\Service\Email\TagsResource;
use Sendpulse\RestApi\Generated\Service\Email\BlacklistResource;
use Sendpulse\RestApi\Generated\Service\Email\BalanceResource;
use Sendpulse\RestApi\Generated\Service\Email\WebhooksResource;
use Sendpulse\RestApi\Service\AbstractService;

final class EmailService extends AbstractService
{
    public function mailingLists(): MailingListsResource
    {
        return new MailingListsResource($this->client);
    }

    public function emailAddress(): EmailAddressResource
    {
        return new EmailAddressResource($this->client);
    }

    public function campaigns(): CampaignsResource
    {
        return new CampaignsResource($this->client);
    }

    public function templates(): TemplatesResource
    {
        return new TemplatesResource($this->client);
    }

    public function senders(): SendersResource
    {
        return new SendersResource($this->client);
    }

    public function tags(): TagsResource
    {
        return new TagsResource($this->client);
    }

    public function blacklist(): BlacklistResource
    {
        return new BlacklistResource($this->client);
    }

    public function balance(): BalanceResource
    {
        return new BalanceResource($this->client);
    }

    public function webhooks(): WebhooksResource
    {
        return new WebhooksResource($this->client);
    }
}