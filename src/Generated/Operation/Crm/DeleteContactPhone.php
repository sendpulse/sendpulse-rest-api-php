<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteContactPhone
{
    public static function build(
        int $contactId,
        int $phoneId,
    ): Request
    {
        $uri = str_replace('{phoneId}', (string) $phoneId, str_replace('{contactId}', (string) $contactId, '/contacts/{contactId}/phones/{phoneId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}