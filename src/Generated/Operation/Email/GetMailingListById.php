<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetMailingListById
{
    public static function build(
        int $id,
    ): Request
    {
        $uri = str_replace('{id}', (string) $id, '/addressbooks/{id}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}