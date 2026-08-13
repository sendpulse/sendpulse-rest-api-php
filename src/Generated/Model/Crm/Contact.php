<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Contact
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $userId = null,
        public readonly ?string $sourceType = null,
        public readonly ?int $responsibleId = null,
        public readonly ?string $firstName = null,
        public readonly ?string $lastName = null,
        public readonly ?int $dealsQty = null,
        public readonly ?string $externalContactId = null,
        /** @var ContactComment[]|null */
        public readonly ?array $comments = null,
        /** @var ContactTag[]|null */
        public readonly ?array $tags = null,
        /** @var ContactPhone[]|null */
        public readonly ?array $phones = null,
        /** @var ContactEmail[]|null */
        public readonly ?array $emails = null,
        /** @var ContactMessenger[]|null */
        public readonly ?array $messengers = null,
        /** @var ContactAttributeValue[]|null */
        public readonly ?array $attributes = null,
        /** @var ContactHistory[]|null */
        public readonly ?array $history = null,
        public readonly ?array $tasks = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\EntityAttachment $attachments = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            userId: $data['userId'] ?? null,
            sourceType: $data['sourceType'] ?? null,
            responsibleId: $data['responsibleId'] ?? null,
            firstName: $data['firstName'] ?? null,
            lastName: $data['lastName'] ?? null,
            dealsQty: $data['dealsQty'] ?? null,
            externalContactId: $data['externalContactId'] ?? null,
            comments: isset($data['comments']) && is_array($data['comments']) ? array_map(static fn(array $item) => ContactComment::fromArray($item), $data['comments']) : null,
            tags: isset($data['tags']) && is_array($data['tags']) ? array_map(static fn(array $item) => ContactTag::fromArray($item), $data['tags']) : null,
            phones: isset($data['phones']) && is_array($data['phones']) ? array_map(static fn(array $item) => ContactPhone::fromArray($item), $data['phones']) : null,
            emails: isset($data['emails']) && is_array($data['emails']) ? array_map(static fn(array $item) => ContactEmail::fromArray($item), $data['emails']) : null,
            messengers: isset($data['messengers']) && is_array($data['messengers']) ? array_map(static fn(array $item) => ContactMessenger::fromArray($item), $data['messengers']) : null,
            attributes: isset($data['attributes']) && is_array($data['attributes']) ? array_map(static fn(array $item) => ContactAttributeValue::fromArray($item), $data['attributes']) : null,
            history: isset($data['history']) && is_array($data['history']) ? array_map(static fn(array $item) => ContactHistory::fromArray($item), $data['history']) : null,
            tasks: $data['tasks'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            updatedAt: $data['updatedAt'] ?? null,
            attachments: isset($data['attachments']) && is_array($data['attachments']) ? EntityAttachment::fromArray($data['attachments']) : null,
        );
    }
}