<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteTask
{
    public static function build(
        int $taskId,
    ): Request
    {
        $uri = str_replace('{taskId}', rawurlencode((string) $taskId), '/crm/v1/tasks/{taskId}');

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}