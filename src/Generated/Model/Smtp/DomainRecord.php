<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Smtp;

final class DomainRecord
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $user_id = null,
        public readonly ?int $service_type = null,
        public readonly ?string $service_value = null,
        public readonly ?int $status = null,
        public readonly ?bool $is_default = null,
        public readonly ?int $ssl_type = null,
        public readonly mixed $checks = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            user_id: $data['user_id'] ?? null,
            service_type: $data['service_type'] ?? null,
            service_value: $data['service_value'] ?? null,
            status: $data['status'] ?? null,
            is_default: $data['is_default'] ?? null,
            ssl_type: $data['ssl_type'] ?? null,
            checks: $data['checks'] ?? null,
        );
    }
}