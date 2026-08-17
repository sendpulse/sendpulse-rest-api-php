<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class UpdateWebhook
{
    public static function build(
        int $id,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{id}', rawurlencode((string) $id), '/v2/email-service/webhook/{id}');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}