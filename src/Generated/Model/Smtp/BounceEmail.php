<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Smtp;

final class BounceEmail
{
    public function __construct(
        public readonly ?string $email_to = null,
        public readonly ?string $sender = null,
        public readonly ?string $send_date = null,
        public readonly ?string $subject = null,
        public readonly ?int $smtp_answer_code = null,
        public readonly ?string $smtp_answer_subcode = null,
        public readonly ?string $smtp_answer_data = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            email_to: $data['email_to'] ?? null,
            sender: $data['sender'] ?? null,
            send_date: $data['send_date'] ?? null,
            subject: $data['subject'] ?? null,
            smtp_answer_code: $data['smtp_answer_code'] ?? null,
            smtp_answer_subcode: $data['smtp_answer_subcode'] ?? null,
            smtp_answer_data: $data['smtp_answer_data'] ?? null,
        );
    }
}