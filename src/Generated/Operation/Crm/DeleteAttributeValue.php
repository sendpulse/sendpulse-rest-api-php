<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteAttributeValue
{
    public static function build(
        int $attributeId,
        int $valueId,
    ): Request
    {
        $uri = str_replace('{valueId}', rawurlencode((string) $valueId), str_replace('{attributeId}', rawurlencode((string) $attributeId), '/crm/v1/{boardId}/attributes/{attributeId}/values/{valueId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}