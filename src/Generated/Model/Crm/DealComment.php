<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class DealComment
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $userId = null,
        public readonly mixed $eventData = null,
        public readonly ?int $status = null,
        public readonly ?string $eventTime = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        /** @var EntityAttachment[]|null */
        public readonly ?array $attachments = null,
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
            eventData: $data['eventData'] ?? null,
            status: $data['status'] ?? null,
            eventTime: $data['eventTime'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            updatedAt: $data['updatedAt'] ?? null,
            attachments: isset($data['attachments']) && is_array($data['attachments']) ? array_map(static fn(array $item) => EntityAttachment::fromArray($item), $data['attachments']) : null,
            childCount: $data['childCount'] ?? null,
            childUsers: $data['childUsers'] ?? null,
        );
    }
}