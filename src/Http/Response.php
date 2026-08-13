<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Http;

final readonly class Response
{
    /**
     * @param array<string, string> $headers
     */
    public function __construct(
        public int $statusCode,
        public array $headers,
        public string $body,
    ) {
    }

    public function isSuccess(): bool
    {
        return $this->statusCode >= 200 && $this->statusCode < 300;
    }

    /**
     * @throws \JsonException
     */
    public function json(): mixed
    {
        return json_decode($this->body, associative: true, flags: JSON_THROW_ON_ERROR);
    }
}
