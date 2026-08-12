<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class Sender
{
    public function __construct(
        public readonly ?string $email = null,
        public readonly ?string $name = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'] ?? null,
            name: $data['name'] ?? null,
        );
    }
}