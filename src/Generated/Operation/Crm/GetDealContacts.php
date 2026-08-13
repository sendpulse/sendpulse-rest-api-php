<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetDealContacts
{
    public static function build(
        int $dealId,
    ): Request
    {
        $uri = str_replace('{dealId}', (string) $dealId, '/deals/{dealId}/contacts');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}