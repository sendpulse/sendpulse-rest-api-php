<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetCampaigns
{
    public static function build(
        ?int $limit = null,
        ?int $offset = null,
        ?string $order = null,
        ?array $status = null,
        ?bool $planed = null,
    ): Request
    {
        $uri = '/campaigns';
        $query = array_filter([
            'limit' => $limit,
            'offset' => $offset,
            'order' => $order,
            'status' => $status,
            'planed' => $planed,
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