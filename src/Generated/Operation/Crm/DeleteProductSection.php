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
        $uri = str_replace('{sectionId}', (string) $sectionId, str_replace('{productId}', (string) $productId, '/products/{productId}/sections/{sectionId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}