<?php

namespace Sendpulse\RestApi\Storage;

use Sendpulse\RestApi\Contracts\TokenStorageInterface;

class SessionStorage implements TokenStorageInterface
{
    /**
     * @param string $key
     * @param string $token
     *
     * @return void
     */
    public function set(string $key, string $token): bool
    {
        $_SESSION[$key] = $token;

        return true;
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function get(string $key): ?string
    {
        return empty($_SESSION[$key])
            ? null
            : (string)$_SESSION[$key];
    }
}
