<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service;

use Sendpulse\RestApi\Generated\Service\Sms\ContactsResource;
use Sendpulse\RestApi\Generated\Service\Sms\ComplianceResource;
use Sendpulse\RestApi\Generated\Service\Sms\CampaignsResource;
use Sendpulse\RestApi\Generated\Service\Sms\ConfigurationResource;
use Sendpulse\RestApi\Service\AbstractService;

final class SmsService extends AbstractService
{
    public function contacts(): ContactsResource
    {
        return new ContactsResource($this->client);
    }

    public function compliance(): ComplianceResource
    {
        return new ComplianceResource($this->client);
    }

    public function campaigns(): CampaignsResource
    {
        return new CampaignsResource($this->client);
    }

    public function configuration(): ConfigurationResource
    {
        return new ConfigurationResource($this->client);
    }
}