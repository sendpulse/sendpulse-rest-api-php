<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetWebhooks
{
    public static function build(): Request
    {
        $uri = '/v2/email-service/webhook';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}