<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class BoardAttribute
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?int $type = null,
        public readonly ?bool $mandatory = null,
        public readonly ?array $options = null,
        public readonly ?int $status = null,
        public readonly ?int $order = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            type: $data['type'] ?? null,
            mandatory: $data['mandatory'] ?? null,
            options: $data['options'] ?? null,
            status: $data['status'] ?? null,
            order: $data['order'] ?? null,
        );
    }
}