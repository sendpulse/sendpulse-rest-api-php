<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class ContactComment
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $userId = null,
        public readonly ?string $text = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\EntityAttachment $attachments = null,
        public readonly ?int $childCount = null,
        public readonly ?array $childUsers = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            userId: $data['userId'] ?? null,
            text: $data['text'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            updatedAt: $data['updatedAt'] ?? null,
            attachments: isset($data['attachments']) && is_array($data['attachments']) ? EntityAttachment::fromArray($data['attachments']) : null,
            childCount: $data['childCount'] ?? null,
            childUsers: $data['childUsers'] ?? null,
        );
    }
}