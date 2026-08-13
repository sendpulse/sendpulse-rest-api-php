<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateProductsInDeal
{
    public static function build(
        int $headId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{headId}', (string) $headId, '/products/deals/{headId}');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}