<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteContactTagFromContact
{
    public static function build(
        int $tagId,
        int $contactId,
    ): Request
    {
        $uri = str_replace('{contactId}', rawurlencode((string) $contactId), str_replace('{tagId}', rawurlencode((string) $tagId), '/crm/v1/contact-tags/{tagId}/contact/{contactId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}