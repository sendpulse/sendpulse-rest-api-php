<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class CampaignCreateRequest
{
    public function __construct(
        public readonly ?string $sender_name = null,
        public readonly ?string $sender_email = null,
        public readonly ?string $subject = null,
        public readonly ?string $body = null,
        public readonly mixed $template_id = null,
        public readonly mixed $list_id = null,
        public readonly ?int $segment_id = null,
        public readonly ?bool $is_test = null,
        public readonly ?string $send_date = null,
        public readonly ?string $name = null,
        public readonly ?bool $use_dynamic_list = null,
        public readonly mixed $attachments = null,
        public readonly mixed $attachments_binary = null,
        public readonly ?string $type = null,
        public readonly ?string $body_amp = null,
        public readonly mixed $stats = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            sender_name: $data['sender_name'] ?? null,
            sender_email: $data['sender_email'] ?? null,
            subject: $data['subject'] ?? null,
            body: $data['body'] ?? null,
            template_id: $data['template_id'] ?? null,
            list_id: $data['list_id'] ?? null,
            segment_id: $data['segment_id'] ?? null,
            is_test: $data['is_test'] ?? null,
            send_date: $data['send_date'] ?? null,
            name: $data['name'] ?? null,
            use_dynamic_list: $data['use_dynamic_list'] ?? null,
            attachments: $data['attachments'] ?? null,
            attachments_binary: $data['attachments_binary'] ?? null,
            type: $data['type'] ?? null,
            body_amp: $data['body_amp'] ?? null,
            stats: $data['stats'] ?? null,
        );
    }
}