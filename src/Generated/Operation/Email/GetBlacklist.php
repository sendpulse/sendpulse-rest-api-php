<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetBlacklist
{
    public static function build(): Request
    {
        $uri = '/blacklist';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}