<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Payment
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\PaymentOrderPrice $price = null,
        public readonly ?int $status = null,
        public readonly ?string $orderId = null,
        public readonly mixed $paymentDescription = null,
        public readonly ?string $paymentMethod = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $promoCode = null,
        public readonly ?float $promoCodeDiscount = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            price: isset($data['price']) && is_array($data['price']) ? PaymentOrderPrice::fromArray($data['price']) : null,
            status: $data['status'] ?? null,
            orderId: $data['orderId'] ?? null,
            paymentDescription: $data['paymentDescription'] ?? null,
            paymentMethod: $data['paymentMethod'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            promoCode: $data['promoCode'] ?? null,
            promoCodeDiscount: $data['promoCodeDiscount'] ?? null,
        );
    }
}