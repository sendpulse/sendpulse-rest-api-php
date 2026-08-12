<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetMessengerTypes;
use Sendpulse\RestApi\Service\AbstractService;

final class MessengersTypesResource extends AbstractService
{
    public function getMessengerTypes(): array
    {
        return $this->send(GetMessengerTypes::build());
    }
}