<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class DealHistory
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $userId = null,
        public readonly ?array $eventData = null,
        public readonly ?string $eventType = null,
        public readonly ?string $eventTime = null,
        public readonly mixed $currentData = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            userId: $data['userId'] ?? null,
            eventData: $data['eventData'] ?? null,
            eventType: $data['eventType'] ?? null,
            eventTime: $data['eventTime'] ?? null,
            currentData: $data['currentData'] ?? null,
        );
    }
}