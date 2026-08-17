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
        $uri = str_replace('{commentId}', rawurlencode((string) $commentId), str_replace('{dealId}', rawurlencode((string) $dealId), '/crm/v1/deals/{dealId}/comments/{commentId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}