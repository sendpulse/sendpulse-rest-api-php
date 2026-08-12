<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class TaskComment
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?int $taskId = null,
        public readonly ?int $userId = null,
        public readonly ?string $body = null,
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
            name: $data['name'] ?? null,
            taskId: $data['taskId'] ?? null,
            userId: $data['userId'] ?? null,
            body: $data['body'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            updatedAt: $data['updatedAt'] ?? null,
            attachments: isset($data['attachments']) && is_array($data['attachments']) ? array_map(static fn(array $item) => EntityAttachment::fromArray($item), $data['attachments']) : null,
            childCount: $data['childCount'] ?? null,
            childUsers: $data['childUsers'] ?? null,
        );
    }
}