<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetEmailCampaignInfo
{
    public static function build(
        int $id,
        string $email,
    ): Request
    {
        $uri = str_replace('{email}', rawurlencode((string) $email), str_replace('{id}', rawurlencode((string) $id), '/campaigns/{id}/email/{email}'));

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}