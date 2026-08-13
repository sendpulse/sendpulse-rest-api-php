<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateContactTag
{
    public static function build(
        int $tagId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{tagId}', (string) $tagId, '/contact-tags/{tagId}');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}