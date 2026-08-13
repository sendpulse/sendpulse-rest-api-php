<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class CommentCompany
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $message = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            message: $data['message'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            updatedAt: $data['updatedAt'] ?? null,
        );
    }
}