<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class TemplateDetails
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $name = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
        );
    }
}