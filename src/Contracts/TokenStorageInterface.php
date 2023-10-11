<?php

/**
 * Interface TokenStorageInterface
 */

namespace Sendpulse\RestApi\Contracts;

interface TokenStorageInterface
{
    /**
     * @param $key string
     * @param string $token
     *
     * @return bool
     */
    public function set(string $key, string $token): bool;

    /**
     * @param string $key
     *
     * @return string|null
     */
    public function get(string $key): ?string;
}
