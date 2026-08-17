<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetContactDeals
{
    public static function build(
        int $contactId,
    ): Request
    {
        $uri = str_replace('{contactId}', rawurlencode((string) $contactId), '/crm/v1/contacts/{contactId}/deals');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}