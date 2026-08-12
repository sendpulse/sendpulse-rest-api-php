<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetCompanyHistory
{
    public static function build(
        ?string $dateFrom = null,
        ?string $dateTo = null,
        ?int $limit = null,
        ?int $offset = null,
    ): Request
    {
        $uri = '/companies/{companyId}/history';
        $query = array_filter([
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
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