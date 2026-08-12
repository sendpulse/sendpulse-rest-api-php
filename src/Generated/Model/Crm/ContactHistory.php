<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class ContactHistory
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $userId = null,
        public readonly ?int $contactId = null,
        public readonly ?string $eventType = null,
        public readonly ?string $eventTime = null,
        public readonly mixed $eventData = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            userId: $data['userId'] ?? null,
            contactId: $data['contactId'] ?? null,
            eventType: $data['eventType'] ?? null,
            eventTime: $data['eventTime'] ?? null,
            eventData: $data['eventData'] ?? null,
        );
    }
}