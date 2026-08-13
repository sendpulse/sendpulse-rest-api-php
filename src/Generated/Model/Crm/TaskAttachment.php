<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class TaskAttachment
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $link = null,
        public readonly ?int $taskId = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            link: $data['link'] ?? null,
            taskId: $data['taskId'] ?? null,
        );
    }
}