<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Smtp;

use Sendpulse\RestApi\Http\Request;

final class GetSmtpSenders
{
    public static function build(): Request
    {
        $uri = '/smtp/senders';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}