<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class BlacklistAddRequest
{
    public function __construct(
        public readonly ?string $emails = null,
        public readonly ?string $comment = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            emails: $data['emails'] ?? null,
            comment: $data['comment'] ?? null,
        );
    }
}