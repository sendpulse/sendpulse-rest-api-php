<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetDealPayments
{
    public static function build(): Request
    {
        $uri = '/payments/deals/{dealId}';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}