<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class RemoveDealContact
{
    public static function build(
        int $dealId,
        int $contactId,
    ): Request
    {
        $uri = str_replace('{contactId}', (string) $contactId, str_replace('{dealId}', (string) $dealId, '/deals/{dealId}/contacts/{contactId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}