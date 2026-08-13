<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Smtp;

final class DomainListData
{
    public function __construct(
        public readonly ?bool $result = null,
        /** @var DomainRecord[]|null */
        public readonly ?array $data = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            result: $data['result'] ?? null,
            data: isset($data['data']) && is_array($data['data']) ? array_map(static fn(array $item) => DomainRecord::fromArray($item), $data['data']) : null,
        );
    }
}