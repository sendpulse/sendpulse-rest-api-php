<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetEmailFromList
{
    public static function build(
        int $id,
        string $email,
    ): Request
    {
        $uri = str_replace('{email}', rawurlencode((string) $email), str_replace('{id}', rawurlencode((string) $id), '/addressbooks/{id}/emails/{email}'));

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}