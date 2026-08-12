<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Chatbot;

final class Account
{
    public function __construct(
        public readonly mixed $tariff = null,
        public readonly mixed $statistics = null,
        public readonly ?array $services = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            tariff: $data['tariff'] ?? null,
            statistics: $data['statistics'] ?? null,
            services: $data['services'] ?? null,
        );
    }
}