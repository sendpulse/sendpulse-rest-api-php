<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Chatbot;

use Sendpulse\RestApi\Http\Request;

final class GetBots
{
    public static function build(): Request
    {
        $uri = '/bots';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}