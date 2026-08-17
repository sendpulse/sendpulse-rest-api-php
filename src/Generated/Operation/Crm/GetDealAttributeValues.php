<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetDealAttributeValues
{
    public static function build(
        int $dealId,
    ): Request
    {
        $uri = str_replace('{dealId}', rawurlencode((string) $dealId), '/crm/v1/deals/{dealId}/attributes');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}