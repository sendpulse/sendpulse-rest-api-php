<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class SubscriberStats
{
    public function __construct(
        public readonly mixed $statistic = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            statistic: $data['statistic'] ?? null,
        );
    }
}