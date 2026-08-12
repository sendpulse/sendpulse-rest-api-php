<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class CompanySortData
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $companyName = null,
        public readonly ?int $responsibleId = null,
        public readonly ?string $address = null,
        public readonly ?int $annualBusinessVolume = null,
        public readonly ?string $currency = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            companyName: $data['companyName'] ?? null,
            responsibleId: $data['responsibleId'] ?? null,
            address: $data['address'] ?? null,
            annualBusinessVolume: $data['annualBusinessVolume'] ?? null,
            currency: $data['currency'] ?? null,
        );
    }
}