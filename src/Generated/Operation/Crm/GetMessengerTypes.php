<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetMessengerTypes
{
    public static function build(): Request
    {
        $uri = '/messenger-types';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}