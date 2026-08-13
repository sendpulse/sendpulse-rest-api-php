<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class ContactMessenger
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $typeId = null,
        public readonly ?string $login = null,
        public readonly ?string $botId = null,
        public readonly ?string $contactId = null,
        public readonly ?int $status = null,
        public readonly ?string $chatbotUrl = null,
        public readonly ?bool $isMainChatbot = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            typeId: $data['typeId'] ?? null,
            login: $data['login'] ?? null,
            botId: $data['botId'] ?? null,
            contactId: $data['contactId'] ?? null,
            status: $data['status'] ?? null,
            chatbotUrl: $data['chatbotUrl'] ?? null,
            isMainChatbot: $data['isMainChatbot'] ?? null,
        );
    }
}