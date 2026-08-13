<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Tests\Unit\Auth;

use PHPUnit\Framework\TestCase;
use Sendpulse\RestApi\Auth\TokenManager;
use Sendpulse\RestApi\Exception\AuthException;
use Sendpulse\RestApi\Exception\ProtocolException;
use Sendpulse\RestApi\Http\Response;
use Sendpulse\RestApi\Tests\Fixture\FakeHttpClient;
use Sendpulse\RestApi\Token\InMemoryTokenStorage;

final class TokenManagerTest extends TestCase
{
    private FakeHttpClient $http;
    private InMemoryTokenStorage $storage;

    protected function setUp(): void
    {
        $this->http    = new FakeHttpClient();
        $this->storage = new InMemoryTokenStorage();
    }

    private function manager(): TokenManager
    {
        return new TokenManager(
            httpClient:   $this->http,
            clientId:     'client-id',
            clientSecret: 'client-secret',
            baseUrl:      'https://api.sendpulse.com',
            storage:      $this->storage,
        );
    }

    private function tokenResponse(int $expiresIn = 3600): Response
    {
        return new Response(200, [], json_encode([
            'access_token' => 'tok-abc',
            'token_type'   => 'Bearer',
            'expires_in'   => $expiresIn,
        ], JSON_THROW_ON_ERROR));
    }

    public function testFetchesTokenWhenStorageEmpty(): void
    {
        $this->http->queue($this->tokenResponse());

        $token = $this->manager()->getToken();

        self::assertSame('tok-abc', $token);
        self::assertSame(1, $this->http->callCount());
    }

    public function testReturnsCachedTokenWithoutHttpCall(): void
    {
        $this->http->queue($this->tokenResponse());
        $manager = $this->manager();

        $manager->getToken();
        $manager->getToken();

        self::assertSame(1, $this->http->callCount());
    }

    public function testRefetchesWhenTokenExpiresSoon(): void
    {
        $this->http->queue(
            $this->tokenResponse(expiresIn: 200),
            $this->tokenResponse(expiresIn: 3600),
        );
        $manager = $this->manager();

        $manager->getToken();
        $manager->getToken();

        self::assertSame(2, $this->http->callCount());
    }

    public function testInvalidateForcesRefetch(): void
    {
        $this->http->queue(
            $this->tokenResponse(),
            $this->tokenResponse(),
        );
        $manager = $this->manager();

        $manager->getToken();
        $manager->invalidate();
        $manager->getToken();

        self::assertSame(2, $this->http->callCount());
    }

    public function testThrowsAuthExceptionOnNon200Response(): void
    {
        $this->http->queue(new Response(401, [], '{"error":"invalid_client"}'));
        $this->expectException(AuthException::class);

        $this->manager()->getToken();
    }

    public function testThrowsProtocolExceptionOnInvalidJson(): void
    {
        $this->http->queue(new Response(200, [], 'not-json'));
        $this->expectException(ProtocolException::class);

        $this->manager()->getToken();
    }

    public function testThrowsProtocolExceptionOnMissingFields(): void
    {
        $this->http->queue(new Response(200, [], '{"access_token":"tok"}'));
        $this->expectException(ProtocolException::class);

        $this->manager()->getToken();
    }

    public function testStorageKeyIsDerivedFromClientId(): void
    {
        $this->http->queue($this->tokenResponse());
        $this->manager()->getToken();

        $key = hash('sha256', 'client-id');
        self::assertNotNull($this->storage->get($key));
    }

    public function testSendsCorrectOAuthRequest(): void
    {
        $this->http->queue($this->tokenResponse());
        $this->manager()->getToken();

        $req = $this->http->lastRequest();
        self::assertSame('POST', $req->method);
        self::assertStringEndsWith('/oauth/access_token', $req->uri);
        self::assertStringContainsString('client_id=client-id', $req->body ?? '');
        self::assertStringContainsString('grant_type=client_credentials', $req->body ?? '');
    }
}
