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
        $uri = str_replace('{commentId}', rawurlencode((string) $commentId), str_replace('{contactId}', rawurlencode((string) $contactId), '/crm/v1/contacts/{contactId}/comments/{commentId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}