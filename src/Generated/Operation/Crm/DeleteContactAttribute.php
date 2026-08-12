<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteContactAttribute
{
    public static function build(
        int $attributeId,
    ): Request
    {
        $uri = str_replace('{attributeId}', (string) $attributeId, '/contacts/attributes/{attributeId}');

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}