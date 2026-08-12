<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Token;

final class InMemoryTokenStorage implements TokenStorage
{
    /** @var array<string, array{access_token: string, token_type: string, expires_at: int}> */
    private array $store = [];

    public function get(string $key): ?array
    {
        return $this->store[$key] ?? null;
    }

    public function set(string $key, array $token): void
    {
        $this->store[$key] = $token;
    }

    public function delete(string $key): void
    {
        unset($this->store[$key]);
    }
}
