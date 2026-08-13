<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Http;

use Sendpulse\RestApi\Exception\NetworkException;

interface HttpClient
{
    /**
     * @throws NetworkException
     */
    public function send(Request $request): Response;
}
