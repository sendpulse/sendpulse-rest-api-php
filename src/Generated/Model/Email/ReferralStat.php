<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class ReferralStat
{
    public function __construct(
        public readonly ?string $link = null,
        public readonly ?int $count = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            link: $data['link'] ?? null,
            count: $data['count'] ?? null,
        );
    }
}