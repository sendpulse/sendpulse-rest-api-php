<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class MessengerType
{
    public function __construct(
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\MessengerTypeProperty $id = null,
        public readonly ?string $name = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: isset($data['id']) && is_array($data['id']) ? MessengerTypeProperty::fromArray($data['id']) : null,
            name: $data['name'] ?? null,
        );
    }
}