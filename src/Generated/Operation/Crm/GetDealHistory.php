<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetDealHistory
{
    public static function build(
        int $dealId,
        string $fromDate,
        string $toDate,
    ): Request
    {
        $uri = str_replace('{dealId}', (string) $dealId, '/deals/{dealId}/history');
        $query = array_filter([
            'fromDate' => $fromDate,
            'toDate' => $toDate,
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