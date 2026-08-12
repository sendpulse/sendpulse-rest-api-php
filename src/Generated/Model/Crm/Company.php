<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Company
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $companyName = null,
        public readonly ?int $responsibleId = null,
        public readonly ?string $address = null,
        public readonly ?int $annualBusinessVolume = null,
        public readonly ?string $currency = null,
        /** @var Messenger[]|null */
        public readonly ?array $messengers = null,
        /** @var Phone[]|null */
        public readonly ?array $phones = null,
        /** @var Email[]|null */
        public readonly ?array $emails = null,
        /** @var Attribute[]|null */
        public readonly ?array $attributes = null,
        public readonly ?array $contacts = null,
        /** @var AttachmentResource[]|null */
        public readonly ?array $attachments = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            companyName: $data['companyName'] ?? null,
            responsibleId: $data['responsibleId'] ?? null,
            address: $data['address'] ?? null,
            annualBusinessVolume: $data['annualBusinessVolume'] ?? null,
            currency: $data['currency'] ?? null,
            messengers: isset($data['messengers']) && is_array($data['messengers']) ? array_map(static fn(array $item) => Messenger::fromArray($item), $data['messengers']) : null,
            phones: isset($data['phones']) && is_array($data['phones']) ? array_map(static fn(array $item) => Phone::fromArray($item), $data['phones']) : null,
            emails: isset($data['emails']) && is_array($data['emails']) ? array_map(static fn(array $item) => Email::fromArray($item), $data['emails']) : null,
            attributes: isset($data['attributes']) && is_array($data['attributes']) ? array_map(static fn(array $item) => Attribute::fromArray($item), $data['attributes']) : null,
            contacts: $data['contacts'] ?? null,
            attachments: isset($data['attachments']) && is_array($data['attachments']) ? array_map(static fn(array $item) => AttachmentResource::fromArray($item), $data['attachments']) : null,
            createdAt: $data['createdAt'] ?? null,
            updatedAt: $data['updatedAt'] ?? null,
        );
    }
}