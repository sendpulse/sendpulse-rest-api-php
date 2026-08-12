<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Token;


final class FileTokenStorage implements TokenStorage
{
    private readonly string $dir;

    public function __construct(?string $cacheDir = null)
    {
        $this->dir = rtrim($cacheDir ?? sys_get_temp_dir(), DIRECTORY_SEPARATOR);
    }

    public function get(string $key): ?array
    {
        $path = $this->path($key);

        if (!file_exists($path)) {
            return null;
        }

        if (is_link($path)) {
            return null;
        }

        $fp = fopen($path, 'r');
        if ($fp === false) {
            return null;
        }

        flock($fp, LOCK_SH);
        $content = stream_get_contents($fp);
        flock($fp, LOCK_UN);
        fclose($fp);

        if (!is_string($content) || $content === '') {
            return null;
        }

        try {
            $data = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException) {
            return null;
        }

        if (!is_array($data)
            || !isset($data['access_token'], $data['token_type'], $data['expires_at'])
            || !is_string($data['access_token'])
            || !is_string($data['token_type'])
            || !is_int($data['expires_at'])
        ) {
            return null;
        }

        return $data;
    }

    public function set(string $key, array $token): void
    {
        $path = $this->path($key);
        $tmp  = $path . '.tmp.' . getmypid();

        $fp = fopen($tmp, 'w');
        if ($fp === false) {
            throw new \RuntimeException("Cannot open token cache file for writing: {$tmp}");
        }

        flock($fp, LOCK_EX);

        try {
            $written = fwrite($fp, json_encode($token, JSON_THROW_ON_ERROR));
        } catch (\JsonException $e) {
            flock($fp, LOCK_UN);
            fclose($fp);
            unlink($tmp);

            throw new \RuntimeException('Failed to encode token', 0, $e);
        }

        fflush($fp);
        flock($fp, LOCK_UN);
        fclose($fp);

        if ($written === false) {
            unlink($tmp);

            throw new \RuntimeException("Failed to write token cache file: {$tmp}");
        }

        chmod($tmp, 0600);
        rename($tmp, $path);
    }

    public function delete(string $key): void
    {
        $path = $this->path($key);
        if (file_exists($path)) {
            unlink($path);
        }
    }

    private function path(string $key): string
    {
        return $this->dir . DIRECTORY_SEPARATOR . 'sp_token_' . $key . '.json';
    }
}
