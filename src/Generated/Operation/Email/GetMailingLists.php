<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetMailingLists
{
    public static function build(
        ?int $limit = null,
        ?int $offset = null,
    ): Request
    {
        $uri = '/addressbooks';
        $query = array_filter([
            'limit' => $limit,
            'offset' => $offset,
        ], fn($v) => $v !== null);

        if ($query) {
            $uri .= '?' . http_build_query($query);
        }

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}