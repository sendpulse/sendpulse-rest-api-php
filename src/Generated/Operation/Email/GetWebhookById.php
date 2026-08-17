<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetWebhookById
{
    public static function build(
        int $id,
    ): Request
    {
        $uri = str_replace('{id}', rawurlencode((string) $id), '/v2/email-service/webhook/{id}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}