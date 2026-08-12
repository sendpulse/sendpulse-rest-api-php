<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Chatbot;

final class Bot
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly mixed $channel_data = null,
        public readonly mixed $inbox = null,
        public readonly ?int $status = null,
        public readonly ?string $created_at = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            channel_data: $data['channel_data'] ?? null,
            inbox: $data['inbox'] ?? null,
            status: $data['status'] ?? null,
            created_at: $data['created_at'] ?? null,
        );
    }
}