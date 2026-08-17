<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class CreateProductSections
{
    public static function build(
        float $productId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{productId}', rawurlencode((string) $productId), '/crm/v1/products/{productId}/sections');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'POST',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}