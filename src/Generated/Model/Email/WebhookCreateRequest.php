<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class WebhookCreateRequest
{
    public function __construct(
        public readonly ?string $url = null,
        public readonly ?array $actions = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            url: $data['url'] ?? null,
            actions: $data['actions'] ?? null,
        );
    }
}