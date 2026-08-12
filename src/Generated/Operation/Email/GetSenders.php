<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetSenders
{
    public static function build(): Request
    {
        $uri = '/senders';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}