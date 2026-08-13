<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Chatbot;

use Sendpulse\RestApi\Generated\Operation\Chatbot\GetBots;
use Sendpulse\RestApi\Service\AbstractService;

final class BotsResource extends AbstractService
{
    public function getBots(): array
    {
        return $this->send(GetBots::build());
    }
}