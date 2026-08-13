<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateProductCategory
{
    public static function build(
        float $categoryId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{categoryId}', (string) $categoryId, '/products/categories/{categoryId}');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}