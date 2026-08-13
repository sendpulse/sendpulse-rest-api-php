<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Sms;

final class CampaignDelivery
{
    public function __construct(
        public readonly ?bool $result = null,
        public readonly ?int $campaign_id = null,
        public readonly mixed $counters = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            result: $data['result'] ?? null,
            campaign_id: $data['campaign_id'] ?? null,
            counters: $data['counters'] ?? null,
        );
    }
}