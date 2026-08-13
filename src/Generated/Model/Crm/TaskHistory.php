<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class TaskHistory
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $taskId = null,
        public readonly ?string $eventTime = null,
        public readonly ?string $eventType = null,
        public readonly mixed $eventData = null,
        public readonly ?float $userId = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            taskId: $data['taskId'] ?? null,
            eventTime: $data['eventTime'] ?? null,
            eventType: $data['eventType'] ?? null,
            eventData: $data['eventData'] ?? null,
            userId: $data['userId'] ?? null,
        );
    }
}