<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Chatbot;

use Sendpulse\RestApi\Http\Request;

final class GetAccount
{
    public static function build(): Request
    {
        $uri = '/account';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}