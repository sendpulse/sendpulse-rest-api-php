<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetBalance
{
    public static function build(): Request
    {
        $uri = '/balance';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}