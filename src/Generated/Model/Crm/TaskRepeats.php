<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class TaskRepeats
{
    public function __construct(
        public readonly ?int $type = null,
        public readonly ?string $startDate = null,
        public readonly mixed $endSetting = null,
        public readonly mixed $setting = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            type: $data['type'] ?? null,
            startDate: $data['startDate'] ?? null,
            endSetting: $data['endSetting'] ?? null,
            setting: $data['setting'] ?? null,
        );
    }
}