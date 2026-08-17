<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetEmailsTotalCount
{
    public static function build(
        int $id,
        ?bool $active = null,
    ): Request
    {
        $uri = str_replace('{id}', rawurlencode((string) $id), '/addressbooks/{id}/emails/total');
        $query = array_filter([
            'active' => $active,
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