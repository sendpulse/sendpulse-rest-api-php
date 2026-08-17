<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetProductsByContactDeals
{
    public static function build(
        float $contactId,
    ): Request
    {
        $uri = str_replace('{contactId}', rawurlencode((string) $contactId), '/crm/v1/products/contacts/{contactId}/deals');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}