<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Pagination
{
    public function __construct(
        public readonly ?int $currentPage = null,
        public readonly ?int $lastPage = null,
        public readonly ?int $perPage = null,
        public readonly ?int $total = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            currentPage: $data['currentPage'] ?? null,
            lastPage: $data['lastPage'] ?? null,
            perPage: $data['perPage'] ?? null,
            total: $data['total'] ?? null,
        );
    }
}