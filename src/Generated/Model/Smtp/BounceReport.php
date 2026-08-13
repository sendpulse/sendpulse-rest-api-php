<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Smtp;

final class BounceReport
{
    public function __construct(
        public readonly ?int $total = null,
        /** @var BounceEmail[]|null */
        public readonly ?array $emails = null,
        public readonly ?int $request_limit = null,
        public readonly ?int $found = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            total: $data['total'] ?? null,
            emails: isset($data['emails']) && is_array($data['emails']) ? array_map(static fn(array $item) => BounceEmail::fromArray($item), $data['emails']) : null,
            request_limit: $data['request_limit'] ?? null,
            found: $data['found'] ?? null,
        );
    }
}