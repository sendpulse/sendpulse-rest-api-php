<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateBoardAttribute
{
    public static function build(
        int $boardId,
        int $attributeId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{attributeId}', rawurlencode((string) $attributeId), str_replace('{boardId}', rawurlencode((string) $boardId), '/crm/v1/boards/{boardId}/attributes/{attributeId}'));
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}