<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Sms;

use Sendpulse\RestApi\Http\Request;

final class GetSmsCampaigns
{
    public static function build(
        ?string $dateFrom = null,
        ?string $dateTo = null,
    ): Request
    {
        $uri = '/sms/campaigns/list';
        $query = array_filter([
            'dateFrom' => $dateFrom,
            'dateTo' => $dateTo,
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