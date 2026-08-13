<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Smtp;

final class ResultTrue
{
    public function __construct(
        public readonly ?bool $result = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            result: $data['result'] ?? null,
        );
    }
}