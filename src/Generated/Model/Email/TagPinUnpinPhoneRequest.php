<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class TagPinUnpinPhoneRequest
{
    public function __construct(
        public readonly ?string $phone = null,
        public readonly ?array $tags = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            phone: $data['phone'] ?? null,
            tags: $data['tags'] ?? null,
        );
    }
}