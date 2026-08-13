<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Phone
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?bool $isMain = null,
        public readonly ?string $phone = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            isMain: $data['isMain'] ?? null,
            phone: $data['phone'] ?? null,
        );
    }
}