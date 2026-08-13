<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class PaymentOrderPrice
{
    public function __construct(
        public readonly ?string $amount = null,
        public readonly ?string $currency = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            amount: $data['amount'] ?? null,
            currency: $data['currency'] ?? null,
        );
    }
}