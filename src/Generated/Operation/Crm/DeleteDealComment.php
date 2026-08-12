<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteDealComment
{
    public static function build(
        int $dealId,
        int $commentId,
    ): Request
    {
        $uri = str_replace('{commentId}', (string) $commentId, str_replace('{dealId}', (string) $dealId, '/deals/{dealId}/comments/{commentId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}