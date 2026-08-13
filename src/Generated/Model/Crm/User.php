<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class User
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $firstname = null,
        public readonly ?string $lastname = null,
        public readonly ?string $email = null,
        public readonly ?string $avatar = null,
        public readonly ?string $lang = null,
        public readonly ?int $timezone = null,
        public readonly ?string $currency = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            firstname: $data['firstname'] ?? null,
            lastname: $data['lastname'] ?? null,
            email: $data['email'] ?? null,
            avatar: $data['avatar'] ?? null,
            lang: $data['lang'] ?? null,
            timezone: $data['timezone'] ?? null,
            currency: $data['currency'] ?? null,
        );
    }
}