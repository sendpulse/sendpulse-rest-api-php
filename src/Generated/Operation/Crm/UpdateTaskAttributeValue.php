<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateTaskAttributeValue
{
    public static function build(
        int $attributeId,
        int $valueId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{valueId}', rawurlencode((string) $valueId), str_replace('{attributeId}', rawurlencode((string) $attributeId), '/crm/v1/{boardId}/attributes/{attributeId}/values/{valueId}'));
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}