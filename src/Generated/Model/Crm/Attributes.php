<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Attributes
{
    public function __construct(
        public readonly ?int $type = null,
        public readonly ?string $name = null,
        public readonly ?bool $status = null,
        /** @var AttributeValue[]|null */
        public readonly ?array $value = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'] ?? null,
            name: $data['name'] ?? null,
            status: $data['status'] ?? null,
            value: isset($data['value']) && is_array($data['value']) ? array_map(static fn(array $item) => AttributeValue::fromArray($item), $data['value']) : null,
        );
    }
}