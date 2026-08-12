<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Step
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $pipelineId = null,
        public readonly ?string $name = null,
        public readonly ?int $order = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\DefaultStatusProperty $status = null,
        public readonly ?string $color = null,
        public readonly ?int $addEndHours = null,
        public readonly ?string $notifyIn = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            pipelineId: $data['pipelineId'] ?? null,
            name: $data['name'] ?? null,
            order: $data['order'] ?? null,
            status: isset($data['status']) && is_array($data['status']) ? DefaultStatusProperty::fromArray($data['status']) : null,
            color: $data['color'] ?? null,
            addEndHours: $data['addEndHours'] ?? null,
            notifyIn: $data['notifyIn'] ?? null,
        );
    }
}