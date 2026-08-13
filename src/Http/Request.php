<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Http;

final readonly class Request
{
    /**
     * @param array<string, string> $headers
     */
    public function __construct(
        public string $method,
        public string $uri,
        public array $headers = [],
        public ?string $body = null,
    ) {
    }
}
