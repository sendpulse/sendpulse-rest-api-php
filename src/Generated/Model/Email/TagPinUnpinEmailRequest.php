<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class TagPinUnpinEmailRequest
{
    public function __construct(
        public readonly ?string $email = null,
        public readonly ?array $tags = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'] ?? null,
            tags: $data['tags'] ?? null,
        );
    }
}