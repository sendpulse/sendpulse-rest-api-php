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
        $uri = str_replace('{contactId}', rawurlencode((string) $contactId), str_replace('{dealId}', rawurlencode((string) $dealId), '/crm/v1/deals/{dealId}/contacts/{contactId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}