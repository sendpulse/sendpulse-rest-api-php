<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Smtp;

use Sendpulse\RestApi\Http\Request;

final class AddSmtpDomain
{
    public static function build(
        string $domain,
    ): Request
    {
        $uri = str_replace('{domain}', (string) $domain, '/v2/email-service/smtp/sender_domains/{domain}');

        return new Request(
            method:  'POST',
            uri:     $uri,
        );
    }
}