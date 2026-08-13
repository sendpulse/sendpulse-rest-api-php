<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class ChangeTaskStepOrder
{
    public static function build(
        int $taskId,
        int $stepId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{stepId}', (string) $stepId, str_replace('{taskId}', (string) $taskId, '/tasks/{taskId}/steps/{stepId}/order'));
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'POST',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}