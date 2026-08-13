<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateTaskChecklists
{
    public static function build(
        int $taskId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{taskId}', (string) $taskId, '/tasks/{taskId}/checklists');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}