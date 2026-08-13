<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class RemoveDealExpiration
{
    public static function build(
        int $dealId,
    ): Request
    {
        $uri = str_replace('{dealId}', (string) $dealId, '/deals/{dealId}/expiration');

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}