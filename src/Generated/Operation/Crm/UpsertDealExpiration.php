<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpsertDealExpiration
{
    public static function build(
        int $dealId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{dealId}', rawurlencode((string) $dealId), '/crm/v1/deals/{dealId}/expiration');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}