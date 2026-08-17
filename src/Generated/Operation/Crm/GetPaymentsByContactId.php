<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetPaymentsByContactId
{
    public static function build(): Request
    {
        $uri = '/crm/v1/payments/contacts/{contactId}';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}