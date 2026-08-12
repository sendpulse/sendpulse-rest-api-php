<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class AddEmailsSingleOptIn
{
    public function __construct(
        public readonly ?array $emails = null,
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