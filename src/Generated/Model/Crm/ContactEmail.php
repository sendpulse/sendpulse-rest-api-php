<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class ContactEmail
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $email = null,
        public readonly ?bool $isMain = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            email: $data['email'] ?? null,
            isMain: $data['isMain'] ?? null,
        );
    }
}