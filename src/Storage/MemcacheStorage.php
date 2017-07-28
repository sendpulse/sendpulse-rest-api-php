<?php

/**
 * Memcache storage
 * Class Session
 */

namespace Sendpulse\RestApi\Storage;

use Memcache;

class MemcacheStorage implements TokenStorageInterface
{
    /**
     * @var null | MemcacheStorage
     */
    protected $instance;

    /**
     * 30 days
     *
     * @var int
     */
    protected $keyTtl = 3600;

    /**
     * Session constructor.
     *
     * @param      $host
     * @param      $port
     * @param bool $persistent
     */
    public function __construct($host, $port, $persistent = false)
    {
        $this->instance = new Memcache();
        if ($persistent) {
            $this->instance->pconnect($host, $port);
        } else {
            $this->instance->connect($host, $port);
        }
    }

    /**
     * @return MemcacheStorage|null
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * @return int
     */
    public function getKeyTtl()
    {
        return $this->keyTtl;
    }

    /**
     * @param int $keyTtl
     *
     * @return MemcacheStorage
     */
    public function setKeyTtl($keyTtl)
    {
        $this->keyTtl = $keyTtl;

        return $this;
    }

    /**
     * @param $key string
     * @param $token
     *
     * @return void
     */
    public function set($key, $token)
    {
        $this->instance->set($key, $token, false, $this->keyTtl);
    }

    /**
     * @param $key string
     *
     * @return mixed
     */
    public function get($key)
    {
        $token = $this->instance->get($key);
        if (!empty($token)) {
            return $token;
        }

        return null;
    }
}
