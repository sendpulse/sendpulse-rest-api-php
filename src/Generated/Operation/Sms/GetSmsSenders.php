<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Sms;

use Sendpulse\RestApi\Http\Request;

final class GetSmsSenders
{
    public static function build(): Request
    {
        $uri = '/sms/senders';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}