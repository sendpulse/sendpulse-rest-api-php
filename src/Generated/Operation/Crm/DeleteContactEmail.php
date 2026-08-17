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
        $uri = str_replace('{emailId}', rawurlencode((string) $emailId), str_replace('{contactId}', rawurlencode((string) $contactId), '/crm/v1/contacts/{contactId}/emails/{emailId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}