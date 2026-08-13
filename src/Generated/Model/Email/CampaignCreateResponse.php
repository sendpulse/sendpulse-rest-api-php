<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class CampaignCreateResponse
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $status = null,
        public readonly ?int $count = null,
        public readonly ?int $tariff_email_qty = null,
        public readonly ?string $overdraft_price = null,
        public readonly ?string $ovedraft_currency = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            status: $data['status'] ?? null,
            count: $data['count'] ?? null,
            tariff_email_qty: $data['tariff_email_qty'] ?? null,
            overdraft_price: $data['overdraft_price'] ?? null,
            ovedraft_currency: $data['ovedraft_currency'] ?? null,
        );
    }
}