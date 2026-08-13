<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetContactsByVariable
{
    public static function build(
        int $id,
        string $variableName,
        string $searchValue,
    ): Request
    {
        $uri = str_replace('{searchValue}', (string) $searchValue, str_replace('{variableName}', (string) $variableName, str_replace('{id}', (string) $id, '/addressbooks/{id}/variables/{variableName}/{searchValue}')));

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}