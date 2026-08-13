<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Comment
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $userId = null,
        public readonly ?string $text = null,
        public readonly ?int $status = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            userId: $data['userId'] ?? null,
            text: $data['text'] ?? null,
            status: $data['status'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            updatedAt: $data['updatedAt'] ?? null,
        );
    }
}