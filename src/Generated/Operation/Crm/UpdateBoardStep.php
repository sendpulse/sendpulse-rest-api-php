<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateBoardStep
{
    public static function build(
        int $boardId,
        int $stepId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{stepId}', (string) $stepId, str_replace('{boardId}', (string) $boardId, '/boards/{boardId}/steps/{stepId}'));
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}