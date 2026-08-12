<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class BalanceResponse
{
    public function __construct(
        public readonly ?string $currency = null,
        public readonly ?float $balance_currency = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            currency: $data['currency'] ?? null,
            balance_currency: $data['balance_currency'] ?? null,
        );
    }
}