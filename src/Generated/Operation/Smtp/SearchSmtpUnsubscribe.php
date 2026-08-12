<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Smtp;

use Sendpulse\RestApi\Http\Request;

final class SearchSmtpUnsubscribe
{
    public static function build(
        string $email,
    ): Request
    {
        $uri = '/smtp/unsubscribe/search';
        $query = array_filter([
            'email' => $email,
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