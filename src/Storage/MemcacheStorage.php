<?php

namespace Sendpulse\RestApi\Storage;

use Memcache;
use Sendpulse\RestApi\Contracts\TokenStorageInterface;

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
     * @param string $host
     * @param int $port
     * @param bool $persistent
     */
    public function __construct(string $host, int $port, bool $persistent = false)
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
    public function getKeyTtl(): int
    {
        return $this->keyTtl;
    }

    /**
     * @param int $keyTtl
     *
     * @return MemcacheStorage
     */
    public function setKeyTtl(int $keyTtl): MemcacheStorage
    {
        $this->keyTtl = $keyTtl;

        return $this;
    }

    /**
     * @param string $key
     * @param string $token
     * @return bool
     */
    public function set(string $key, string $token): bool
    {
        return $this->instance->set($key, $token, false, $this->keyTtl);
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
