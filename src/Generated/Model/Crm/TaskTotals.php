<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class TaskTotals
{
    public function __construct(
        public readonly ?int $total = null,
        public readonly ?array $steps = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            total: $data['total'] ?? null,
            steps: $data['steps'] ?? null,
        );
    }
}