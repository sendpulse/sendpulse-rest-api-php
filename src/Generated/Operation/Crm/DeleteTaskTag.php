<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteTaskTag
{
    public static function build(
        int $tagId,
    ): Request
    {
        $uri = str_replace('{tagId}', (string) $tagId, '/task-tags/{tagId}');

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}