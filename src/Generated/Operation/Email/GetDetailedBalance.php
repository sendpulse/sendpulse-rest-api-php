<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetDetailedBalance
{
    public static function build(): Request
    {
        $uri = '/user/balance/detail';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}