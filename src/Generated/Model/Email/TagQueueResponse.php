<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class TagQueueResponse
{
    public function __construct(
        public readonly ?string $code = null,
        public readonly ?string $description = null,
        public readonly ?bool $failure = null,
        public readonly ?int $http_code = null,
        public readonly ?string $queue_id = null,
        public readonly ?bool $success = null,
        public readonly ?int $user_id = null,
        public readonly ?string $version = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            code: $data['code'] ?? null,
            description: $data['description'] ?? null,
            failure: $data['failure'] ?? null,
            http_code: $data['http_code'] ?? null,
            queue_id: $data['queue_id'] ?? null,
            success: $data['success'] ?? null,
            user_id: $data['user_id'] ?? null,
            version: $data['version'] ?? null,
        );
    }
}