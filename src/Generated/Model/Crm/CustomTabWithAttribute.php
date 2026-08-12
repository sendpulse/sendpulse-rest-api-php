<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class CustomTabWithAttribute
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?int $userId = null,
        public readonly ?bool $isVisible = null,
        public readonly ?bool $isDefault = null,
        public readonly ?int $type = null,
        public readonly ?int $entityType = null,
        public readonly ?int $entityId = null,
        public readonly ?array $attributes = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            userId: $data['userId'] ?? null,
            isVisible: $data['isVisible'] ?? null,
            isDefault: $data['isDefault'] ?? null,
            type: $data['type'] ?? null,
            entityType: $data['entityType'] ?? null,
            entityId: $data['entityId'] ?? null,
            attributes: $data['attributes'] ?? null,
        );
    }
}