<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteProductSection
{
    public static function build(
        float $productId,
        float $sectionId,
    ): Request
    {
        $uri = str_replace('{sectionId}', rawurlencode((string) $sectionId), str_replace('{productId}', rawurlencode((string) $productId), '/crm/v1/products/{productId}/sections/{sectionId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}