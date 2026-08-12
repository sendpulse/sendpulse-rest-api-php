<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class Webhook
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $user_id = null,
        public readonly ?string $url = null,
        public readonly ?string $action = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            user_id: $data['user_id'] ?? null,
            url: $data['url'] ?? null,
            action: $data['action'] ?? null,
        );
    }
}