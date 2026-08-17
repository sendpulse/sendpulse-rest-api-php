<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Sms;

use Sendpulse\RestApi\Http\Request;

final class CancelSmsCampaign
{
    public static function build(
        int $id,
    ): Request
    {
        $uri = str_replace('{id}', rawurlencode((string) $id), '/sms/campaigns/cancel/{id}');

        return new Request(
            method:  'PUT',
            uri:     $uri,
        );
    }
}