<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Smtp;

final class DomainResult
{
    public function __construct(
        public readonly ?\Sendpulse\RestApi\Generated\Model\Smtp\ResultTrue $data = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            data: isset($data['data']) && is_array($data['data']) ? ResultTrue::fromArray($data['data']) : null,
        );
    }
}