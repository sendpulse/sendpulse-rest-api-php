<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class ResultTrueWithId
{
    public function __construct(
        public readonly ?bool $result = null,
        public readonly ?int $id = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            result: $data['result'] ?? null,
            id: $data['id'] ?? null,
        );
    }
}