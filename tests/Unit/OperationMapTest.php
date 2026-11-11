<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Sendpulse\RestApi\Client;
use Sendpulse\RestApi\Http\Response;
use Sendpulse\RestApi\Tests\Fixture\FakeHttpClient;

final class OperationMapTest extends TestCase
{
    private FakeHttpClient $http;
    private Client $client;

    protected function setUp(): void
    {
        $this->http   = new FakeHttpClient();
        $this->client = new Client(apiKey: 'test', httpClient: $this->http);
    }

    public function testChainDispatchesGetWithPathParam(): void
    {
        $this->http->queue(new Response(200, [], '{"id":5}'));

        $result = $this->client->crm->deals->getDeal(['dealId' => 5]);

        $request = $this->http->lastRequest();
        self::assertSame('GET', $request->method);
        self::assertStringEndsWith('/crm/v1/deals/5', $request->uri);
        self::assertSame(['id' => 5], $result);
    }

    public function testChainDispatchesPostBody(): void
    {
        $this->http->queue(new Response(200, [], '{"result":true}'));

        $this->client->smtp->emails->sendSmtpEmail(['email' => ['subject' => 'Hi']]);

        $request = $this->http->lastRequest();
        self::assertSame('POST', $request->method);
        self::assertStringEndsWith('/smtp/emails', $request->uri);
        self::assertSame('{"email":{"subject":"Hi"}}', $request->body);
    }

    public function testGetParamsBecomeQueryString(): void
    {
        $this->http->queue(new Response(200, [], '[]'));

        $this->client->email->campaigns->getCampaigns(['limit' => 10]);

        self::assertStringContainsString('limit=10', $this->http->lastRequest()->uri);
    }

    public function testMissingRequiredParamThrows(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->client->crm->deals->getDeal([]);
    }

    public function testUnknownOperationThrows(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->client->crm->nope->doThing([]);
    }
}
