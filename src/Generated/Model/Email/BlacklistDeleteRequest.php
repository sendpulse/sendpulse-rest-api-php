<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class BlacklistDeleteRequest
{
    public function __construct(
        public readonly ?string $emails = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            emails: $data['emails'] ?? null,
        );
    }
}