<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Service;

use Sendpulse\RestApi\Client;
use Sendpulse\RestApi\Http\Request;

abstract class AbstractService
{
    public function __construct(protected readonly Client $client)
    {
    }

    /** @return array<mixed> */
    protected function send(Request $request): array
    {
        return $this->client->send($request);
    }
}
