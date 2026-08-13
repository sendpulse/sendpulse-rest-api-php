<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateContactEmail
{
    public static function build(
        int $contactId,
        int $emailId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{emailId}', (string) $emailId, str_replace('{contactId}', (string) $contactId, '/contacts/{contactId}/emails/{emailId}'));
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}