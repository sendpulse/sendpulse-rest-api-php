<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class DealExpiration
{
    public function __construct(
        public readonly ?string $date = null,
        public readonly mixed $time = null,
        public readonly ?string $dateTime = null,
        public readonly ?bool $notificationEnabled = null,
        public readonly mixed $notifyIn = null,
        public readonly ?bool $expired = null,
        public readonly ?bool $expires_within_day = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            date: $data['date'] ?? null,
            time: $data['time'] ?? null,
            dateTime: $data['dateTime'] ?? null,
            notificationEnabled: $data['notificationEnabled'] ?? null,
            notifyIn: $data['notifyIn'] ?? null,
            expired: $data['expired'] ?? null,
            expires_within_day: $data['expires_within_day'] ?? null,
        );
    }
}