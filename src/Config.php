<?php

declare(strict_types=1);

namespace Sendpulse\RestApi;

use Sendpulse\RestApi\Http\HttpClient;
use Sendpulse\RestApi\Token\TokenStorage;

final readonly class Config
{
    public const DEFAULT_BASE_URL        = 'https://api.sendpulse.com';
    public const DEFAULT_CONNECT_TIMEOUT = 10;
    public const DEFAULT_REQUEST_TIMEOUT = 30;

    public string $baseUrl;
    public int $connectTimeout;
    public int $requestTimeout;

    public function __construct(
        public readonly ?string $apiKey = null,
        public readonly ?string $clientId = null,
        public readonly ?string $clientSecret = null,
        ?int $connectTimeout = null,
        ?int $requestTimeout = null,
        public readonly ?string $cacheDir = null,
        public readonly ?TokenStorage $tokenStorage = null,
        public readonly ?HttpClient $httpClient = null,
    ) {
        $this->validate();

        $this->baseUrl        = self::DEFAULT_BASE_URL;
        $this->connectTimeout = $connectTimeout ?? self::DEFAULT_CONNECT_TIMEOUT;
        $this->requestTimeout = $requestTimeout ?? self::DEFAULT_REQUEST_TIMEOUT;
    }

    public function isOAuth(): bool
    {
        return $this->clientId !== null;
    }

    /**
     * @return array<string, mixed>
     */
    public function __debugInfo(): array
    {
        return [
            'apiKey'          => $this->apiKey !== null ? '***' : null,
            'clientId'        => $this->clientId !== null ? '***' : null,
            'clientSecret'    => $this->clientSecret !== null ? '***' : null,
            'baseUrl'         => $this->baseUrl,
            'connectTimeout'  => $this->connectTimeout,
            'requestTimeout'  => $this->requestTimeout,
            'cacheDir'        => $this->cacheDir,
        ];
    }

    private function validate(): void
    {
        $hasApiKey = $this->apiKey !== null && $this->apiKey !== '';
        $hasOAuth  = $this->clientId !== null && $this->clientId !== ''
                  && $this->clientSecret !== null && $this->clientSecret !== '';

        if (!$hasApiKey && !$hasOAuth) {
            throw new \InvalidArgumentException(
                'Provide either apiKey or both clientId and clientSecret.',
            );
        }

        if ($hasApiKey && ($this->clientId !== null || $this->clientSecret !== null)) {
            throw new \InvalidArgumentException(
                'Provide either apiKey or clientId+clientSecret, not both.',
            );
        }
    }
}
