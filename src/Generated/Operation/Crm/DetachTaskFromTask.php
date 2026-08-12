<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DetachTaskFromTask
{
    public static function build(
        int $taskHeadId,
        int $taskId,
    ): Request
    {
        $uri = str_replace('{taskId}', (string) $taskId, str_replace('{taskHeadId}', (string) $taskHeadId, '/task-to-task/{taskHeadId}/task/{taskId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}