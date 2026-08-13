<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Smtp;

use Sendpulse\RestApi\Http\Request;

final class GetSmtpEmailInfo
{
    public static function build(
        string $id,
    ): Request
    {
        $uri = str_replace('{id}', (string) $id, '/smtp/emails/{id}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}