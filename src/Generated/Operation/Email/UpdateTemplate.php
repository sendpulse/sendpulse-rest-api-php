<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class UpdateTemplate
{
    public static function build(
        int $id,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{id}', rawurlencode((string) $id), '/template/edit/{id}');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'POST',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}