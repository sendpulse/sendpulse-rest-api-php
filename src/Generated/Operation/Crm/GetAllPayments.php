<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetAllPayments
{
    public static function build(): Request
    {
        $uri = '/payments/all';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}