<?php

/**
 * Interface TokenStorageInterface
 */

namespace Sendpulse\RestApi\Storage;

interface TokenStorageInterface
{
    /**
     * @param $key string
     * @param $token
     *
     * @return mixed
     */
    public function set($key, $token);

    /**
     * @param $key string
     *
     * @return mixed
     */
    public function get($key);
}
