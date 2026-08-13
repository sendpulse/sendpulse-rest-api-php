<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Email;

use Sendpulse\RestApi\Generated\Operation\Email\GetWebhooks;
use Sendpulse\RestApi\Generated\Model\Email\WebhookListResponse;
use Sendpulse\RestApi\Generated\Operation\Email\CreateWebhook;
use Sendpulse\RestApi\Generated\Operation\Email\GetWebhookById;
use Sendpulse\RestApi\Generated\Model\Email\WebhookResponse;
use Sendpulse\RestApi\Generated\Operation\Email\UpdateWebhook;
use Sendpulse\RestApi\Generated\Model\Email\WebhookResult;
use Sendpulse\RestApi\Generated\Operation\Email\DeleteWebhook;
use Sendpulse\RestApi\Service\AbstractService;

final class WebhooksResource extends AbstractService
{
    public function getWebhooks(): WebhookListResponse
    {
        return WebhookListResponse::fromArray($this->send(GetWebhooks::build()));
    }

    public function createWebhook(array $body = []): WebhookListResponse
    {
        return WebhookListResponse::fromArray($this->send(CreateWebhook::build(
            body: $body,
        )));
    }

    public function getWebhookById(int $id): WebhookResponse
    {
        return WebhookResponse::fromArray($this->send(GetWebhookById::build(
            id: $id,
        )));
    }

    public function updateWebhook(int $id, array $body = []): WebhookResult
    {
        return WebhookResult::fromArray($this->send(UpdateWebhook::build(
            id: $id,
            body: $body,
        )));
    }

    public function deleteWebhook(int $id): WebhookResult
    {
        return WebhookResult::fromArray($this->send(DeleteWebhook::build(
            id: $id,
        )));
    }
}