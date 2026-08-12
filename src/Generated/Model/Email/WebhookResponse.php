<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class WebhookResponse
{
    public function __construct(
        public readonly ?bool $success = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Email\Webhook $data = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            success: $data['success'] ?? null,
            data: isset($data['data']) && is_array($data['data']) ? Webhook::fromArray($data['data']) : null,
        );
    }
}