<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Token;

/**
 * @phpstan-type TokenData array{access_token: string, token_type: string, expires_at: int}
 */
interface TokenStorage
{
    /** @return TokenData|null */
    public function get(string $key): ?array;

    /** @param TokenData $token */
    public function set(string $key, array $token): void;

    public function delete(string $key): void;
}
