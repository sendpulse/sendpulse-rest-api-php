<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Smtp;

use Sendpulse\RestApi\Http\Request;

final class GetBounceReport
{
    public static function build(
        ?string $date = null,
        ?int $limit = null,
        ?int $offset = null,
    ): Request
    {
        $uri = '/smtp/bounces/day';
        $query = array_filter([
            'date' => $date,
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