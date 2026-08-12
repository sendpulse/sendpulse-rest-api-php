<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetTaskById
{
    public static function build(
        int $taskId,
    ): Request
    {
        $uri = str_replace('{taskId}', (string) $taskId, '/tasks/{taskId}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}