<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetBoardById
{
    public static function build(
        int $boardId,
    ): Request
    {
        $uri = str_replace('{boardId}', (string) $boardId, '/boards/{boardId}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}