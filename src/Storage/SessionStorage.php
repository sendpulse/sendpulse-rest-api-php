<?php

/**
 * Session token storage
 * Class SessionStorage
 */

namespace Sendpulse\RestApi\Storage;

class SessionStorage implements TokenStorageInterface
{
    /**
     * @param string $key
     * @param        $token
     *
     * @return void
     */
    public function set($key, $token)
    {
        $_SESSION[$key] = $token;
    }

    /**
     * @param $key string
     *
     * @return mixed
     */
    public function get($key)
    {
        if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return null;
    }
}
