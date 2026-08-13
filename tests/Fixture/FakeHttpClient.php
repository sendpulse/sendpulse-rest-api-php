<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Tests\Fixture;

use Sendpulse\RestApi\Http\HttpClient;
use Sendpulse\RestApi\Http\Request;
use Sendpulse\RestApi\Http\Response;

final class FakeHttpClient implements HttpClient
{
    /** @var list<Response> */
    private array $queue = [];

    /** @var list<Request> */
    private array $sent = [];

    public function queue(Response ...$responses): void
    {
        foreach ($responses as $r) {
            $this->queue[] = $r;
        }
    }

    public function send(Request $request): Response
    {
        $this->sent[] = $request;

        if ($this->queue === []) {
            throw new \LogicException('FakeHttpClient: no response queued');
        }

        return array_shift($this->queue);
    }

    public function lastRequest(): Request
    {
        if ($this->sent === []) {
            throw new \LogicException('FakeHttpClient: no request sent');
        }

        return end($this->sent);
    }

    /** @return list<Request> */
    public function allRequests(): array
    {
        return $this->sent;
    }

    public function callCount(): int
    {
        return count($this->sent);
    }
}
