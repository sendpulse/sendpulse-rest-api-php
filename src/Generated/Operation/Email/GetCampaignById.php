<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetCampaignById
{
    public static function build(
        int $id,
    ): Request
    {
        $uri = str_replace('{id}', (string) $id, '/campaigns/{id}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}