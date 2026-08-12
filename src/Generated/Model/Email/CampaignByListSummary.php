<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class CampaignByListSummary
{
    public function __construct(
        public readonly ?int $task_id = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            task_id: $data['task_id'] ?? null,
        );
    }
}