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
        $uri = str_replace('{contactId}', (string) $contactId, str_replace('{tagId}', (string) $tagId, '/contact-tags/{tagId}/contact/{contactId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}