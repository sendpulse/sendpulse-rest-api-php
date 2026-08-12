<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class MailingList
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?int $all_email_qty = null,
        public readonly ?int $active_email_qty = null,
        public readonly ?int $inactive_email_qty = null,
        public readonly ?string $creationdate = null,
        public readonly ?int $status = null,
        public readonly ?string $status_explain = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            all_email_qty: $data['all_email_qty'] ?? null,
            active_email_qty: $data['active_email_qty'] ?? null,
            inactive_email_qty: $data['inactive_email_qty'] ?? null,
            creationdate: $data['creationdate'] ?? null,
            status: $data['status'] ?? null,
            status_explain: $data['status_explain'] ?? null,
        );
    }
}