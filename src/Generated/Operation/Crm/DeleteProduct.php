<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteProduct
{
    public static function build(
        float $productId,
    ): Request
    {
        $uri = str_replace('{productId}', rawurlencode((string) $productId), '/crm/v1/products/{productId}');

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}