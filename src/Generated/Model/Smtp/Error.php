<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Smtp;

final class Error
{
    public function __construct(
        public readonly ?string $message = null,
        public readonly ?int $error_code = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            message: $data['message'] ?? null,
            error_code: $data['error_code'] ?? null,
        );
    }
}