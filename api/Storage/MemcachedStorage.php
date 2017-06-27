<?php

/**
 * Memcache storage
 * Class Session
 */
class MemcachedStorage implements TokenStorageInterface
{
    /**
     * @var null | MemcachedStorage
     */
    protected $instance = null;

    /**
     * 30 days
     * @var int
     */
    protected $keyTtl = 3600;

    /**
     * Session constructor.
     * @param $host
     * @param $port
     * @param bool $persistent
     */
    public function __construct($host, $port, $persistent = false)
    {
        if ($persistent) {
            $persistentKey = 'sendpulseRestApiTokenStorage';
        } else {
            $persistentKey = null;
        }
        $this->instance = new Memcached($persistentKey);
        $this->instance->addServer($host, $port);
    }

    /**
     * @return MemcachedStorage|null
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
     * @return MemcachedStorage
     */
    public function setKeyTtl($keyTtl)
    {
        $this->keyTtl = $keyTtl;

        return $this;
    }

    /**
     * @param $key string
     * @param $token
     * @return mixed
     */
    public function set($key, $token)
    {
        $this->instance->set($key, $token, $this->keyTtl);
    }

    /**
     * @param $key string
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