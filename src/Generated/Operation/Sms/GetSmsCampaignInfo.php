<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Sms;

use Sendpulse\RestApi\Http\Request;

final class GetSmsCampaignInfo
{
    public static function build(
        int $id,
    ): Request
    {
        $uri = str_replace('{id}', (string) $id, '/sms/campaigns/info/{id}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}