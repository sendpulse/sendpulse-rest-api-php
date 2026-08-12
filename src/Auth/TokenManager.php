<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Auth;

use Sendpulse\RestApi\Exception\AuthException;
use Sendpulse\RestApi\Exception\ProtocolException;
use Sendpulse\RestApi\Http\HttpClient;
use Sendpulse\RestApi\Http\Request;
use Sendpulse\RestApi\Token\TokenStorage;

final class TokenManager
{
    private const EXPIRY_BUFFER = 300;

    private bool $invalidated = false;

    private readonly string $storageKey;

    public function __construct(
        private readonly HttpClient $httpClient,
        private readonly string $clientId,
        private readonly string $clientSecret,
        private readonly string $baseUrl,
        private readonly TokenStorage $storage,
    ) {
        $this->storageKey = hash('sha256', $clientId);
    }

    public function getToken(): string
    {
        if (!$this->invalidated) {
            $cached = $this->storage->get($this->storageKey);

            if ($cached !== null && $cached['expires_at'] > time() + self::EXPIRY_BUFFER) {
                return $cached['access_token'];
            }
        }

        return $this->fetchAndStore();
    }

    public function invalidate(): void
    {
        $this->storage->delete($this->storageKey);
        $this->invalidated = true;
    }

    private function fetchAndStore(): string
    {
        $body = http_build_query([
            'grant_type'    => 'client_credentials',
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
        ]);

        $request = new Request(
            method:  'POST',
            uri:     rtrim($this->baseUrl, '/') . '/oauth/access_token',
            headers: ['Content-Type' => 'application/x-www-form-urlencoded'],
            body:    $body,
        );

        $response = $this->httpClient->send($request);

        if ($response->statusCode !== 200) {
            throw new AuthException($response->statusCode, $response->body, 'OAuth token fetch failed');
        }

        try {
            $data = json_decode($response->body, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new ProtocolException('Failed to decode OAuth response', $e);
        }

        if (!is_array($data)
            || !isset($data['access_token'], $data['token_type'], $data['expires_in'])
            || !is_string($data['access_token'])
            || !is_string($data['token_type'])
            || !is_numeric($data['expires_in'])
        ) {
            throw new ProtocolException('Invalid OAuth token response shape');
        }

        $token = [
            'access_token' => $data['access_token'],
            'token_type'   => $data['token_type'],
            'expires_at'   => time() + (int) $data['expires_in'],
        ];

        $this->storage->set($this->storageKey, $token);
        $this->invalidated = false;

        return $token['access_token'];
    }
}
