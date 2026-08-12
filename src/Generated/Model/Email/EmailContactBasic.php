<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class EmailContactBasic
{
    public function __construct(
        public readonly ?string $email = null,
        public readonly ?int $status = null,
        public readonly ?string $status_explain = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'] ?? null,
            status: $data['status'] ?? null,
            status_explain: $data['status_explain'] ?? null,
        );
    }
}