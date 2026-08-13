<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Sms;

use Sendpulse\RestApi\Http\Request;

final class UpdateContactPhone
{
    public static function build(
        int $id,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{id}', (string) $id, '/addressbooks/{id}/phone');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}