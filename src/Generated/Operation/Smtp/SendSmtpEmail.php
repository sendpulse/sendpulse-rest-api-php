<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Smtp;

use Sendpulse\RestApi\Http\Request;

final class SendSmtpEmail
{
    public static function build(
        array $body = [],
    ): Request
    {
        $uri = '/smtp/emails';
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'POST',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}