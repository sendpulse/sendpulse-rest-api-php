<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class AddEmailsDoubleOptIn
{
    public function __construct(
        public readonly ?array $emails = null,
        public readonly ?string $confirmation = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            emails: $data['emails'] ?? null,
            confirmation: $data['confirmation'] ?? null,
        );
    }
}