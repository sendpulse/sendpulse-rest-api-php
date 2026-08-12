<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Auth;

interface Authentication
{
    public function getAuthorizationHeader(): string;

    public function invalidate(): void;

    public function supportsRefresh(): bool;
}
