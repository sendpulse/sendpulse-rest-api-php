<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class Tag
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?string $color = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            color: $data['color'] ?? null,
        );
    }
}