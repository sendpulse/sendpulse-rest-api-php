<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateProduct
{
    public static function build(
        float $productId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{productId}', (string) $productId, '/products/{productId}');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}