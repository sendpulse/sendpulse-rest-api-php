<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetDealComments
{
    public static function build(
        int $dealId,
    ): Request
    {
        $uri = str_replace('{dealId}', rawurlencode((string) $dealId), '/crm/v1/deals/{dealId}/comments');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}