<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateContactComment
{
    public static function build(
        int $contactId,
        int $commentId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{commentId}', (string) $commentId, str_replace('{contactId}', (string) $contactId, '/contacts/{contactId}/comments/{commentId}'));
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}