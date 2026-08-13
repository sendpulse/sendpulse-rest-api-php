<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service;

use Sendpulse\RestApi\Generated\Service\Chatbot\DialogsResource;
use Sendpulse\RestApi\Generated\Service\Chatbot\AccountResource;
use Sendpulse\RestApi\Generated\Service\Chatbot\BotsResource;
use Sendpulse\RestApi\Service\AbstractService;

final class ChatbotService extends AbstractService
{
    public function dialogs(): DialogsResource
    {
        return new DialogsResource($this->client);
    }

    public function account(): AccountResource
    {
        return new AccountResource($this->client);
    }

    public function bots(): BotsResource
    {
        return new BotsResource($this->client);
    }
}