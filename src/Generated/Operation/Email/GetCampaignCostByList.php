<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetCampaignCostByList
{
    public static function build(
        int $id,
    ): Request
    {
        $uri = str_replace('{id}', rawurlencode((string) $id), '/addressbooks/{id}/cost');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}