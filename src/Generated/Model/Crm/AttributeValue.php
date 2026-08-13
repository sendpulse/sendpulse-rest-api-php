<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class AttributeValue
{
    public function __construct(
        public readonly ?float $id = null,
        public readonly ?string $value = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            value: $data['value'] ?? null,
        );
    }
}