<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class ManagerSettings
{
    public function __construct(
        public readonly ?int $sectionId = null,
        public readonly ?int $responsibleId = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            sectionId: $data['sectionId'] ?? null,
            responsibleId: $data['responsibleId'] ?? null,
        );
    }
}