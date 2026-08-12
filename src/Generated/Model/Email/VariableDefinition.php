<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class VariableDefinition
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $type = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            type: $data['type'] ?? null,
        );
    }
}