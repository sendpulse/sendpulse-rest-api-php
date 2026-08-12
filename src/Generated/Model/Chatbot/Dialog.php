<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Chatbot;

final class Dialog
{
    public function __construct(
        public readonly ?string $_id = null,
        public readonly ?string $bot_id = null,
        public readonly mixed $contact = null,
        public readonly mixed $last_inbox_message = null,
        public readonly mixed $last_outbox_message = null,
        public readonly ?int $service = null,
        public readonly ?int $user_id = null,
        public readonly ?int $inbox_unread_count = null,
        public readonly ?bool $is_chat_opened = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            _id: $data['_id'] ?? null,
            bot_id: $data['bot_id'] ?? null,
            contact: $data['contact'] ?? null,
            last_inbox_message: $data['last_inbox_message'] ?? null,
            last_outbox_message: $data['last_outbox_message'] ?? null,
            service: $data['service'] ?? null,
            user_id: $data['user_id'] ?? null,
            inbox_unread_count: $data['inbox_unread_count'] ?? null,
            is_chat_opened: $data['is_chat_opened'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}