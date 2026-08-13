<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteContactEmail
{
    public static function build(
        int $contactId,
        int $emailId,
    ): Request
    {
        $uri = str_replace('{emailId}', (string) $emailId, str_replace('{contactId}', (string) $contactId, '/contacts/{contactId}/emails/{emailId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}