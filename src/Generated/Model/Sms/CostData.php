<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Sms;

final class CostData
{
    public function __construct(
        public readonly ?float $price = null,
        public readonly ?string $currency = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            price: $data['price'] ?? null,
            currency: $data['currency'] ?? null,
        );
    }
}