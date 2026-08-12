<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Token;

use Psr\SimpleCache\CacheInterface;

final class Psr16TokenStorage implements TokenStorage
{
    private const TTL_BUFFER = 60;

    public function __construct(private readonly CacheInterface $cache)
    {
    }

    public function get(string $key): ?array
    {
        $data = $this->cache->get($key);

        if (!is_array($data)
            || !isset($data['access_token'], $data['token_type'], $data['expires_at'])
            || !is_string($data['access_token'])
            || !is_string($data['token_type'])
            || !is_int($data['expires_at'])
        ) {
            return null;
        }

        return $data;
    }

    public function set(string $key, array $token): void
    {
        $ttl = max(0, $token['expires_at'] - time() - self::TTL_BUFFER);
        $this->cache->set($key, $token, $ttl);
    }

    public function delete(string $key): void
    {
        $this->cache->delete($key);
    }
}
