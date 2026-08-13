<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class MailingListId
{
    public function __construct(
        public readonly ?int $id = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
        );
    }
}