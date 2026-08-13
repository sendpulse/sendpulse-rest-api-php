<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class TelephonyCall
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $integrationId = null,
        public readonly ?int $integrationGroupId = null,
        public readonly ?int $responsibleId = null,
        public readonly ?string $phone = null,
        public readonly ?int $callDuration = null,
        public readonly ?int $callType = null,
        public readonly ?int $state = null,
        public readonly ?string $callRecordLink = null,
        public readonly ?string $createdAt = null,
        public readonly mixed $contact = null,
        public readonly mixed $deal = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            integrationId: $data['integrationId'] ?? null,
            integrationGroupId: $data['integrationGroupId'] ?? null,
            responsibleId: $data['responsibleId'] ?? null,
            phone: $data['phone'] ?? null,
            callDuration: $data['callDuration'] ?? null,
            callType: $data['callType'] ?? null,
            state: $data['state'] ?? null,
            callRecordLink: $data['callRecordLink'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            contact: $data['contact'] ?? null,
            deal: $data['deal'] ?? null,
        );
    }
}