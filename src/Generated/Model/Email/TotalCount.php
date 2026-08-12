<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class TotalCount
{
    public function __construct(
        public readonly ?int $total = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            total: $data['total'] ?? null,
        );
    }
}