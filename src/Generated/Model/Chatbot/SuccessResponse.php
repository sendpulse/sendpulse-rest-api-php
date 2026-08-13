<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Chatbot;

final class SuccessResponse
{
    public function __construct(
        public readonly ?bool $success = null,
        public readonly mixed $data = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            success: $data['success'] ?? null,
            data: $data['data'] ?? null,
        );
    }
}