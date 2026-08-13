<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateContactPhone
{
    public static function build(
        int $contactId,
        int $phoneId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{phoneId}', (string) $phoneId, str_replace('{contactId}', (string) $contactId, '/contacts/{contactId}/phones/{phoneId}'));
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}