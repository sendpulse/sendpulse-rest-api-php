<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Sendpulse\RestApi\Config;

final class ConfigTest extends TestCase
{
    public function testApiKeyOnlyIsValid(): void
    {
        $config = new Config(apiKey: 'my-key');

        self::assertSame('my-key', $config->apiKey);
        self::assertFalse($config->isOAuth());
    }

    public function testOAuthCredentialsAreValid(): void
    {
        $config = new Config(clientId: 'id', clientSecret: 'secret');

        self::assertTrue($config->isOAuth());
    }

    public function testThrowsWhenNoCredentials(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Config();
    }

    public function testThrowsWhenBothApiKeyAndOAuth(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Config(apiKey: 'key', clientId: 'id', clientSecret: 'secret');
    }

    public function testDefaultBaseUrl(): void
    {
        $config = new Config(apiKey: 'key');

        self::assertSame('https://api.sendpulse.com', $config->baseUrl);
    }

    public function testDefaultTimeouts(): void
    {
        $config = new Config(apiKey: 'key');

        self::assertSame(Config::DEFAULT_CONNECT_TIMEOUT, $config->connectTimeout);
        self::assertSame(Config::DEFAULT_REQUEST_TIMEOUT, $config->requestTimeout);
    }

    public function testCustomTimeouts(): void
    {
        $config = new Config(apiKey: 'key', connectTimeout: 5, requestTimeout: 60);

        self::assertSame(5, $config->connectTimeout);
        self::assertSame(60, $config->requestTimeout);
    }
}
