<?php

/**
 * Session token storage
 * Class SessionStorage
 */
class SessionStorage implements TokenStorageInterface
{
    /**
     * @param $key string
     * @param $token
     * @return mixed
     */
    public function set($key, $token)
    {
        $_SESSION[$key] = $token;
    }

    /**
     * @param $key string
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