<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class ContactAttributeValue
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?int $status = null,
        public readonly ?int $type = null,
        public readonly ?bool $mandatory = null,
        public readonly ?bool $contactCardShow = null,
        public readonly ?int $order = null,
        public readonly ?array $options = null,
        public readonly mixed $value = null,
        public readonly ?bool $default = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            status: $data['status'] ?? null,
            type: $data['type'] ?? null,
            mandatory: $data['mandatory'] ?? null,
            contactCardShow: $data['contactCardShow'] ?? null,
            order: $data['order'] ?? null,
            options: $data['options'] ?? null,
            value: $data['value'] ?? null,
            default: $data['default'] ?? null,
        );
    }
}