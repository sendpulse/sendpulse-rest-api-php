<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class EmailCampaignDeliveryInfo
{
    public function __construct(
        public readonly ?string $sent_date = null,
        public readonly ?int $global_status = null,
        public readonly ?string $global_status_explain = null,
        public readonly ?int $detail_status = null,
        public readonly ?string $detail_status_explain = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            sent_date: $data['sent_date'] ?? null,
            global_status: $data['global_status'] ?? null,
            global_status_explain: $data['global_status_explain'] ?? null,
            detail_status: $data['detail_status'] ?? null,
            detail_status_explain: $data['detail_status_explain'] ?? null,
        );
    }
}