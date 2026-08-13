<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetCategoryProduct
{
    public static function build(
        float $productId,
        float $categoryId,
    ): Request
    {
        $uri = str_replace('{categoryId}', (string) $categoryId, str_replace('{productId}', (string) $productId, '/products/categories/{categoryId}/{productId}'));

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}