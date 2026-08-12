<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service;

use Sendpulse\RestApi\Generated\Service\Smtp\EmailsResource;
use Sendpulse\RestApi\Generated\Service\Smtp\BouncesResource;
use Sendpulse\RestApi\Generated\Service\Smtp\UnsubscribeResource;
use Sendpulse\RestApi\Generated\Service\Smtp\ConfigurationResource;
use Sendpulse\RestApi\Service\AbstractService;

final class SmtpService extends AbstractService
{
    public function emails(): EmailsResource
    {
        return new EmailsResource($this->client);
    }

    public function bounces(): BouncesResource
    {
        return new BouncesResource($this->client);
    }

    public function unsubscribe(): UnsubscribeResource
    {
        return new UnsubscribeResource($this->client);
    }

    public function configuration(): ConfigurationResource
    {
        return new ConfigurationResource($this->client);
    }
}