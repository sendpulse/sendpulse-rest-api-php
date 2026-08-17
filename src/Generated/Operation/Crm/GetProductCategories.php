<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetProductCategories
{
    public static function build(): Request
    {
        $uri = '/crm/v1/products/categories';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}