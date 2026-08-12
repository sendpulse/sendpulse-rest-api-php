<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Messenger
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $typeId = null,
        public readonly ?string $login = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            typeId: $data['typeId'] ?? null,
            login: $data['login'] ?? null,
        );
    }
}