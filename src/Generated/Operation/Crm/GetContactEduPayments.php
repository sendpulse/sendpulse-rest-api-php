<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetContactEduPayments
{
    public static function build(
        int $contactId,
    ): Request
    {
        $uri = str_replace('{contactId}', (string) $contactId, '/contacts/{contactId}/edu-payments');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}