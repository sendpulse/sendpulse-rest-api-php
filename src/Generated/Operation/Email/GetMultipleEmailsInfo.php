<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetMultipleEmailsInfo
{
    public static function build(
        array $body = [],
    ): Request
    {
        $uri = '/emails';
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'POST',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}