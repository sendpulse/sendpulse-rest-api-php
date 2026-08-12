<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Sms;

use Sendpulse\RestApi\Generated\Operation\Sms\GetSmsSenders;
use Sendpulse\RestApi\Service\AbstractService;

final class ConfigurationResource extends AbstractService
{
    public function getSmsSenders(): array
    {
        return $this->send(GetSmsSenders::build());
    }
}