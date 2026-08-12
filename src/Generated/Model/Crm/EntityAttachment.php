<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class EntityAttachment
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $link = null,
        public readonly ?float $entityId = null,
        public readonly ?string $entityType = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            link: $data['link'] ?? null,
            entityId: $data['entityId'] ?? null,
            entityType: $data['entityType'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            updatedAt: $data['updatedAt'] ?? null,
        );
    }
}