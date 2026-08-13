<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class UserPaymentData
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $userId = null,
        public readonly ?int $contactId = null,
        public readonly ?int $dealId = null,
        public readonly ?int $status = null,
        public readonly ?string $firstName = null,
        public readonly ?string $lastName = null,
        public readonly ?string $name = null,
        public readonly ?int $responsibleId = null,
        public readonly mixed $price = null,
        public readonly ?string $description = null,
        public readonly ?string $merchantName = null,
        public readonly ?string $merchantUuid = null,
        public readonly ?string $paymentMethod = null,
        public readonly ?string $promoCode = null,
        public readonly ?string $promoCodeDiscount = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $externalContactId = null,
        public readonly ?array $paymentItems = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            userId: $data['userId'] ?? null,
            contactId: $data['contactId'] ?? null,
            dealId: $data['dealId'] ?? null,
            status: $data['status'] ?? null,
            firstName: $data['firstName'] ?? null,
            lastName: $data['lastName'] ?? null,
            name: $data['name'] ?? null,
            responsibleId: $data['responsibleId'] ?? null,
            price: $data['price'] ?? null,
            description: $data['description'] ?? null,
            merchantName: $data['merchantName'] ?? null,
            merchantUuid: $data['merchantUuid'] ?? null,
            paymentMethod: $data['paymentMethod'] ?? null,
            promoCode: $data['promoCode'] ?? null,
            promoCodeDiscount: $data['promoCodeDiscount'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            externalContactId: $data['externalContactId'] ?? null,
            paymentItems: $data['paymentItems'] ?? null,
        );
    }
}