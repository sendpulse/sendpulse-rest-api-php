<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetBalanceByCurrency
{
    public static function build(
        string $currency,
    ): Request
    {
        $uri = str_replace('{currency}', (string) $currency, '/balance/{currency}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}