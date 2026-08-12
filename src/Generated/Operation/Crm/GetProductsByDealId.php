<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetProductsByDealId
{
    public static function build(
        float $dealId,
    ): Request
    {
        $uri = str_replace('{dealId}', (string) $dealId, '/products/deals/{dealId}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}