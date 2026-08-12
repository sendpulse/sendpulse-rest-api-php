<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DetachProductFromDeal
{
    public static function build(
        float $categoryId,
        float $productId,
        float $headId,
    ): Request
    {
        $uri = str_replace('{headId}', (string) $headId, str_replace('{productId}', (string) $productId, str_replace('{categoryId}', (string) $categoryId, '/products/categories/{categoryId}/{productId}/deals/{headId}')));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}