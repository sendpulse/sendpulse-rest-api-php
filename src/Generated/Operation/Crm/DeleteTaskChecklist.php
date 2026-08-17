<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteTaskChecklist
{
    public static function build(
        int $taskId,
        int $checklistId,
    ): Request
    {
        $uri = str_replace('{checklistId}', rawurlencode((string) $checklistId), str_replace('{taskId}', rawurlencode((string) $taskId), '/crm/v1/tasks/{taskId}/checklists/{checklistId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}