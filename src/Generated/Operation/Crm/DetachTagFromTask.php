<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DetachTagFromTask
{
    public static function build(
        int $tagId,
        int $taskId,
    ): Request
    {
        $uri = str_replace('{taskId}', rawurlencode((string) $taskId), str_replace('{tagId}', rawurlencode((string) $tagId), '/crm/v1/task-tags/{tagId}/task/{taskId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}