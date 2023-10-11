<?php

namespace Sendpulse\RestApi\Storage;

use Memcached;
use Sendpulse\RestApi\Contracts\TokenStorageInterface;

class MemcachedStorage implements TokenStorageInterface
{
    /**
     * @var null | MemcachedStorage
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
     * @param string $host
     * @param int $port
     * @param bool $persistent
     */
    public function __construct(string $host, int $port, bool $persistent = false)
    {
        $persistentKey = $persistent ? 'sendpulseRestApiTokenStorage' : null;

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
    public function getKeyTtl(): int
    {
        return $this->keyTtl;
    }

    /**
     * @param int $keyTtl
     *
     * @return MemcachedStorage
     */
    public function setKeyTtl(int $keyTtl): MemcachedStorage
    {
        $this->keyTtl = $keyTtl;

        return $this;
    }

    /**
     * @param $key string
     * @param string $token
     *
     * @return void
     */
    public function set(string $key, string $token): bool
    {
        return $this->instance->set($key, $token, $this->keyTtl);
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function get(string $key): ?string
    {
        $token = $this->instance->get($key);

        return empty($token) ? null : $token;
    }
}
