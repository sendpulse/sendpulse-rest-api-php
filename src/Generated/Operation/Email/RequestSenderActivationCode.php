<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class RequestSenderActivationCode
{
    public static function build(
        string $email,
    ): Request
    {
        $uri = str_replace('{email}', rawurlencode((string) $email), '/senders/{email}/code');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}