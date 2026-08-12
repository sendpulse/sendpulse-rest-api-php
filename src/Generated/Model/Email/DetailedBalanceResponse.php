<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class DetailedBalanceResponse
{
    public function __construct(
        public readonly mixed $balance = null,
        public readonly mixed $email = null,
        public readonly mixed $smtp = null,
        public readonly mixed $push = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            balance: $data['balance'] ?? null,
            email: $data['email'] ?? null,
            smtp: $data['smtp'] ?? null,
            push: $data['push'] ?? null,
        );
    }
}