<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetProductById
{
    public static function build(
        float $productId,
    ): Request
    {
        $uri = str_replace('{productId}', (string) $productId, '/products/{productId}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}