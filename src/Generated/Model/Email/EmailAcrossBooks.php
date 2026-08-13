<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class EmailAcrossBooks
{
    public function __construct(
        public readonly ?int $book_id = null,
        public readonly ?string $email = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            book_id: $data['book_id'] ?? null,
            email: $data['email'] ?? null,
        );
    }
}