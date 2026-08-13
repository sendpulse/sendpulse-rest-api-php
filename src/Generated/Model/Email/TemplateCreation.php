<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class TemplateCreation
{
    public function __construct(
        public readonly ?bool $result = null,
        public readonly ?int $real_id = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            result: $data['result'] ?? null,
            real_id: $data['real_id'] ?? null,
        );
    }
}