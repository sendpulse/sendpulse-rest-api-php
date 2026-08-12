<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class DealAttribute
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\DefaultStatusProperty $status = null,
        public readonly ?int $type = null,
        public readonly ?bool $mandatory = null,
        public readonly ?int $order = null,
        public readonly ?array $options = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            status: isset($data['status']) && is_array($data['status']) ? DefaultStatusProperty::fromArray($data['status']) : null,
            type: $data['type'] ?? null,
            mandatory: $data['mandatory'] ?? null,
            order: $data['order'] ?? null,
            options: $data['options'] ?? null,
        );
    }
}