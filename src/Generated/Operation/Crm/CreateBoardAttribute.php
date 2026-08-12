<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class CreateBoardAttribute
{
    public static function build(
        int $boardId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{boardId}', (string) $boardId, '/boards/{boardId}/attributes');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'POST',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}