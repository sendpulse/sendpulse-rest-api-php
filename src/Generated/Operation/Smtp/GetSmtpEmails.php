<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Smtp;

use Sendpulse\RestApi\Http\Request;

final class GetSmtpEmails
{
    public static function build(
        ?int $limit = null,
        ?int $offset = null,
        ?string $from = null,
        ?string $to = null,
        ?string $sender = null,
        ?string $recipient = null,
        ?string $country = null,
    ): Request
    {
        $uri = '/smtp/emails';
        $query = array_filter([
            'limit' => $limit,
            'offset' => $offset,
            'from' => $from,
            'to' => $to,
            'sender' => $sender,
            'recipient' => $recipient,
            'country' => $country,
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