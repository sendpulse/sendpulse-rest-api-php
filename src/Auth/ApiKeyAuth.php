<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Auth;

final class ApiKeyAuth implements Authentication
{
    public function __construct(private readonly string $apiKey)
    {
    }

    public function getAuthorizationHeader(): string
    {
        return 'Bearer ' . $this->apiKey;
    }

    public function invalidate(): void
    {
    }

    public function supportsRefresh(): bool
    {
        return false;
    }
}
