<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Auth;

final class OAuthAuth implements Authentication
{
    public function __construct(private readonly TokenManager $tokenManager)
    {
    }

    public function getAuthorizationHeader(): string
    {
        return 'Bearer ' . $this->tokenManager->getToken();
    }

    public function invalidate(): void
    {
        $this->tokenManager->invalidate();
    }

    public function supportsRefresh(): bool
    {
        return true;
    }
}
