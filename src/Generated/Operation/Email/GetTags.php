<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetTags
{
    public static function build(): Request
    {
        $uri = '/tags';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}