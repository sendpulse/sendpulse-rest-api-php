<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class WebhookListResponse
{
    public function __construct(
        public readonly ?bool $success = null,
        /** @var Webhook[]|null */
        public readonly ?array $data = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            success: $data['success'] ?? null,
            data: isset($data['data']) && is_array($data['data']) ? array_map(static fn(array $item) => Webhook::fromArray($item), $data['data']) : null,
        );
    }
}