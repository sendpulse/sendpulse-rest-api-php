<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteProductCategory
{
    public static function build(
        float $categoryId,
    ): Request
    {
        $uri = str_replace('{categoryId}', rawurlencode((string) $categoryId), '/crm/v1/products/categories/{categoryId}');

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}