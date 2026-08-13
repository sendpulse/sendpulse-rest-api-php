<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Boards
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?int $userId = null,
        public readonly ?int $order = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\BoardSteps $steps = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\BoardSettings $settings = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\BoardAttribute $attributes = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            userId: $data['userId'] ?? null,
            order: $data['order'] ?? null,
            steps: isset($data['steps']) && is_array($data['steps']) ? BoardSteps::fromArray($data['steps']) : null,
            settings: isset($data['settings']) && is_array($data['settings']) ? BoardSettings::fromArray($data['settings']) : null,
            attributes: isset($data['attributes']) && is_array($data['attributes']) ? BoardAttribute::fromArray($data['attributes']) : null,
        );
    }
}