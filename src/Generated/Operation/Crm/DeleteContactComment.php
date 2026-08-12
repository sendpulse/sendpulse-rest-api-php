<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteContactComment
{
    public static function build(
        int $contactId,
        int $commentId,
    ): Request
    {
        $uri = str_replace('{commentId}', (string) $commentId, str_replace('{contactId}', (string) $contactId, '/contacts/{contactId}/comments/{commentId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}