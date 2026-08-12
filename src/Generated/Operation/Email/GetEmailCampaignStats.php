<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetEmailCampaignStats
{
    public static function build(
        string $email,
    ): Request
    {
        $uri = str_replace('{email}', (string) $email, '/emails/{email}/campaigns');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}