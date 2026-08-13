<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Sms;

use Sendpulse\RestApi\Http\Request;

final class GetSmsBlacklist
{
    public static function build(): Request
    {
        $uri = '/sms/black_list';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}