<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Email;

final class TagListResponse
{
    public function __construct(
        /** @var Tag[]|null */
        public readonly ?array $tags = null,
        public readonly ?int $user_id = null,
        public readonly ?string $version = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            tags: isset($data['tags']) && is_array($data['tags']) ? array_map(static fn(array $item) => Tag::fromArray($item), $data['tags']) : null,
            user_id: $data['user_id'] ?? null,
            version: $data['version'] ?? null,
        );
    }
}