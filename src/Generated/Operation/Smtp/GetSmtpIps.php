<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Smtp;

use Sendpulse\RestApi\Http\Request;

final class GetSmtpIps
{
    public static function build(): Request
    {
        $uri = '/smtp/ips';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}