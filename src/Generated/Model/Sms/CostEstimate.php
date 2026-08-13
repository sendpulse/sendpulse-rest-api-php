<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Sms;

final class CostEstimate
{
    public function __construct(
        public readonly ?bool $result = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Sms\CostData $data = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            result: $data['result'] ?? null,
            data: isset($data['data']) && is_array($data['data']) ? CostData::fromArray($data['data']) : null,
        );
    }
}