<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class DeleteTag
{
    public static function build(
        int $id,
    ): Request
    {
        $uri = str_replace('{id}', rawurlencode((string) $id), '/tags/{id}');

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}