<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class ListContactInfo
{
    public function __construct(
        public readonly ?string $email = null,
        public readonly ?string $abook_id = null,
        public readonly ?string $phone = null,
        public readonly ?int $status = null,
        public readonly ?string $status_explain = null,
        public readonly ?array $variables = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'] ?? null,
            abook_id: $data['abook_id'] ?? null,
            phone: $data['phone'] ?? null,
            status: $data['status'] ?? null,
            status_explain: $data['status_explain'] ?? null,
            variables: $data['variables'] ?? null,
        );
    }
}