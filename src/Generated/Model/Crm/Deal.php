<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Deal
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?int $pipelineId = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\DealStatusProperty $status = null,
        public readonly ?int $stepId = null,
        public readonly ?int $responsibleId = null,
        public readonly ?int $number = null,
        public readonly ?string $name = null,
        public readonly ?float $price = null,
        public readonly ?string $currency = null,
        public readonly ?float $profit = null,
        public readonly ?bool $hasExpense = null,
        public readonly ?int $order = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\DealSourceType $sourceType = null,
        public readonly ?int $sourceId = null,
        /** @var DealHistory[]|null */
        public readonly ?array $history = null,
        /** @var DealComment[]|null */
        public readonly ?array $comments = null,
        /** @var DealAttributeValue[]|null */
        public readonly ?array $attributes = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\DealExpiration $expiration = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\EntityAttachment $attachments = null,
        public readonly ?array $tasks = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            pipelineId: $data['pipelineId'] ?? null,
            status: isset($data['status']) && is_array($data['status']) ? DealStatusProperty::fromArray($data['status']) : null,
            stepId: $data['stepId'] ?? null,
            responsibleId: $data['responsibleId'] ?? null,
            number: $data['number'] ?? null,
            name: $data['name'] ?? null,
            price: $data['price'] ?? null,
            currency: $data['currency'] ?? null,
            profit: $data['profit'] ?? null,
            hasExpense: $data['hasExpense'] ?? null,
            order: $data['order'] ?? null,
            sourceType: isset($data['sourceType']) && is_array($data['sourceType']) ? DealSourceType::fromArray($data['sourceType']) : null,
            sourceId: $data['sourceId'] ?? null,
            history: isset($data['history']) && is_array($data['history']) ? array_map(static fn(array $item) => DealHistory::fromArray($item), $data['history']) : null,
            comments: isset($data['comments']) && is_array($data['comments']) ? array_map(static fn(array $item) => DealComment::fromArray($item), $data['comments']) : null,
            attributes: isset($data['attributes']) && is_array($data['attributes']) ? array_map(static fn(array $item) => DealAttributeValue::fromArray($item), $data['attributes']) : null,
            expiration: isset($data['expiration']) && is_array($data['expiration']) ? DealExpiration::fromArray($data['expiration']) : null,
            attachments: isset($data['attachments']) && is_array($data['attachments']) ? EntityAttachment::fromArray($data['attachments']) : null,
            tasks: $data['tasks'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            updatedAt: $data['updatedAt'] ?? null,
        );
    }
}