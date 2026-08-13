<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Smtp;

use Sendpulse\RestApi\Http\Request;

final class GetSmtpAllowedDomains
{
    public static function build(): Request
    {
        $uri = '/v2/email-service/smtp/sender_domains';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}