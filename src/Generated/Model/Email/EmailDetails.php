<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class EmailDetails
{
    public function __construct(
        public readonly ?string $list_name = null,
        public readonly ?string $source = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            list_name: $data['list_name'] ?? null,
            source: $data['source'] ?? null,
        );
    }
}