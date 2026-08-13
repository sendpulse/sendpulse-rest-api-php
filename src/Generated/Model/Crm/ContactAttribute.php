<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class ContactAttribute
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?int $status = null,
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
            status: $data['status'] ?? null,
            order: $data['order'] ?? null,
            options: $data['options'] ?? null,
        );
    }
}