<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Chatbot;

use Sendpulse\RestApi\Generated\Operation\Chatbot\GetAccount;
use Sendpulse\RestApi\Service\AbstractService;

final class AccountResource extends AbstractService
{
    public function getAccount(): array
    {
        return $this->send(GetAccount::build());
    }
}