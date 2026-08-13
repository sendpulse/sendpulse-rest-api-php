<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class History
{
    public function __construct(
        public readonly ?string $eventType = null,
        public readonly ?array $eventData = null,
        public readonly ?string $date = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            eventType: $data['eventType'] ?? null,
            eventData: $data['eventData'] ?? null,
            date: $data['date'] ?? null,
        );
    }
}