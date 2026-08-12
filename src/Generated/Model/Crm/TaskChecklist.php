<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class TaskChecklist
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?int $taskId = null,
        public readonly ?bool $isDone = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\ChecklistItems $items = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            taskId: $data['taskId'] ?? null,
            isDone: $data['isDone'] ?? null,
            items: isset($data['items']) && is_array($data['items']) ? ChecklistItems::fromArray($data['items']) : null,
        );
    }
}