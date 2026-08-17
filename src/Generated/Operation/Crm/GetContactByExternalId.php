<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetContactByExternalId
{
    public static function build(
        int $externalContactId,
    ): Request
    {
        $uri = str_replace('{externalContactId}', rawurlencode((string) $externalContactId), '/crm/v1/contacts/external/{externalContactId}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}