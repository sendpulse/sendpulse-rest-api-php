<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class CampaignUpdateRequest
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly ?string $subject = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? null,
            subject: $data['subject'] ?? null,
        );
    }
}