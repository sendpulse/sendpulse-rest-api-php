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
        $uri = str_replace('{headId}', rawurlencode((string) $headId), str_replace('{productId}', rawurlencode((string) $productId), str_replace('{categoryId}', rawurlencode((string) $categoryId), '/crm/v1/products/categories/{categoryId}/{productId}/deals/{headId}')));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}