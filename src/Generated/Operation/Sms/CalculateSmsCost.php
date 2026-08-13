<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Sms;

use Sendpulse\RestApi\Http\Request;

final class CalculateSmsCost
{
    public static function build(
        string $body,
        string $sender,
        ?int $addressBookId = null,
        ?array $phones = null,
        mixed $route = null,
    ): Request
    {
        $uri = '/sms/campaigns/cost';
        $query = array_filter([
            'addressBookId' => $addressBookId,
            'phones' => $phones,
            'body' => $body,
            'sender' => $sender,
            'route' => $route,
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