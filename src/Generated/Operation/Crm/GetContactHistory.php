<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetContactHistory
{
    public static function build(
        int $contactId,
        string $fromDate,
        string $toDate,
    ): Request
    {
        $uri = str_replace('{contactId}', rawurlencode((string) $contactId), '/crm/v1/contacts/{contactId}/history');
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