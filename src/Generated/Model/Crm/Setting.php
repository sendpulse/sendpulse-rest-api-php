<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Setting
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $value = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            value: $data['value'] ?? null,
        );
    }
}