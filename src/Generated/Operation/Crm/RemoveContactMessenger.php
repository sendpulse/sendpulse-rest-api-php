<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class RemoveContactMessenger
{
    public static function build(
        int $contactId,
        int $messengerId,
    ): Request
    {
        $uri = str_replace('{messengerId}', (string) $messengerId, str_replace('{contactId}', (string) $contactId, '/contacts/{contactId}/messengers/{messengerId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}