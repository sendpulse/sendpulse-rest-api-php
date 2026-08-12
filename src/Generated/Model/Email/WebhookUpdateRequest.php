<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class WebhookUpdateRequest
{
    public function __construct(
        public readonly ?string $url = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            url: $data['url'] ?? null,
        );
    }
}