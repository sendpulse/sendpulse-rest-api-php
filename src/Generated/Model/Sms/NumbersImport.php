<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Sms;

final class NumbersImport
{
    public function __construct(
        public readonly ?bool $result = null,
        public readonly mixed $counters = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            result: $data['result'] ?? null,
            counters: $data['counters'] ?? null,
        );
    }
}