<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Smtp;

use Sendpulse\RestApi\Http\Request;

final class GetSmtpBouncesTotal
{
    public static function build(): Request
    {
        $uri = '/smtp/bounces/day/total';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}