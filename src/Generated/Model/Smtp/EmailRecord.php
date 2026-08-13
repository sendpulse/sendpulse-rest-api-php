<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Smtp;

final class EmailRecord
{
    public function __construct(
        public readonly ?string $id = null,
        public readonly ?string $sender = null,
        public readonly ?int $total_size = null,
        public readonly ?string $sender_ip = null,
        public readonly ?int $smtp_answer_code = null,
        public readonly ?string $smtp_answer_subcode = null,
        public readonly ?string $smtp_answer_data = null,
        public readonly ?string $used_ip = null,
        public readonly ?string $recipient = null,
        public readonly ?string $subject = null,
        public readonly ?string $send_date = null,
        public readonly mixed $tracking = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            sender: $data['sender'] ?? null,
            total_size: $data['total_size'] ?? null,
            sender_ip: $data['sender_ip'] ?? null,
            smtp_answer_code: $data['smtp_answer_code'] ?? null,
            smtp_answer_subcode: $data['smtp_answer_subcode'] ?? null,
            smtp_answer_data: $data['smtp_answer_data'] ?? null,
            used_ip: $data['used_ip'] ?? null,
            recipient: $data['recipient'] ?? null,
            subject: $data['subject'] ?? null,
            send_date: $data['send_date'] ?? null,
            tracking: $data['tracking'] ?? null,
        );
    }
}