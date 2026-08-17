<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateTaskChecklistSingle
{
    public static function build(
        int $taskId,
        int $checklistId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{checklistId}', rawurlencode((string) $checklistId), str_replace('{taskId}', rawurlencode((string) $taskId), '/crm/v1/tasks/{taskId}/checklists/{checklistId}/single'));
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}