<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateTaskTag
{
    public static function build(
        int $tagId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{tagId}', rawurlencode((string) $tagId), '/crm/v1/task-tags/{tagId}');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}