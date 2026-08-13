<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Pipeline
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $userId = null,
        public readonly ?string $name = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\DefaultStatusProperty $status = null,
        public readonly ?int $order = null,
        /** @var Step[]|null */
        public readonly ?array $steps = null,
        /** @var Setting[]|null */
        public readonly ?array $settings = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            userId: $data['userId'] ?? null,
            name: $data['name'] ?? null,
            status: isset($data['status']) && is_array($data['status']) ? DefaultStatusProperty::fromArray($data['status']) : null,
            order: $data['order'] ?? null,
            steps: isset($data['steps']) && is_array($data['steps']) ? array_map(static fn(array $item) => Step::fromArray($item), $data['steps']) : null,
            settings: isset($data['settings']) && is_array($data['settings']) ? array_map(static fn(array $item) => Setting::fromArray($item), $data['settings']) : null,
        );
    }
}