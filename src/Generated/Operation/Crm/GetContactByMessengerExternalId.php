<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetContactByMessengerExternalId
{
    public static function build(
        string $messengerContactId,
    ): Request
    {
        $uri = str_replace('{messengerContactId}', rawurlencode((string) $messengerContactId), '/crm/v1/contacts/messenger-external/{messengerContactId}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}