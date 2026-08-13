<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class CampaignCost
{
    public function __construct(
        public readonly ?string $cur = null,
        public readonly ?int $sent_emails_qty = null,
        public readonly ?float $overdraftAllEmailsPrice = null,
        public readonly ?bool $result = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            cur: $data['cur'] ?? null,
            sent_emails_qty: $data['sent_emails_qty'] ?? null,
            overdraftAllEmailsPrice: $data['overdraftAllEmailsPrice'] ?? null,
            result: $data['result'] ?? null,
        );
    }
}