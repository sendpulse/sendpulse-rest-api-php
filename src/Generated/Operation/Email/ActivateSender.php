<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class ActivateSender
{
    public static function build(
        string $email,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{email}', rawurlencode((string) $email), '/senders/{email}/code');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'POST',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}