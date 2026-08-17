<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetCampaignsByList
{
    public static function build(
        int $id,
        ?int $limit = null,
        ?int $offset = null,
    ): Request
    {
        $uri = str_replace('{id}', rawurlencode((string) $id), '/addressbooks/{id}/campaigns');
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