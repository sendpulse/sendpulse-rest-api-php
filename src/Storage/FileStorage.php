<?php

namespace Sendpulse\RestApi\Storage;

use Sendpulse\RestApi\Contracts\TokenStorageInterface;

class FileStorage implements TokenStorageInterface
{

    /**
     * @var string
     */
    protected $storageFolder = '';

    /**
     * @param string $storageFolder
     */
    public function __construct(string $storageFolder = '')
    {
        $this->storageFolder = $storageFolder;
    }

    /**
     * @param string $key
     * @param string $token
     * @return bool
     */
    public function set(string $key, string $token): bool
    {
        $tokenFile = fopen($this->storageFolder . $key, 'wb');
        fwrite($tokenFile, $token);

        return fclose($tokenFile);
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function get(string $key): ?string
    {
        $filePath = $this->storageFolder . $key;

        return file_exists($filePath) ? file_get_contents($filePath) : null;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function delete(string $key): bool
    {
        $filePath = $this->storageFolder . $key;

        return file_exists($filePath) && unlink($filePath);
    }
}
