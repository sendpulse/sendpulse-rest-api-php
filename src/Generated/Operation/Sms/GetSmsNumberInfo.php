<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Sms;

use Sendpulse\RestApi\Http\Request;

final class GetSmsNumberInfo
{
    public static function build(
        int $addressBookId,
        string $phoneNumber,
    ): Request
    {
        $uri = str_replace('{phoneNumber}', rawurlencode((string) $phoneNumber), str_replace('{addressBookId}', rawurlencode((string) $addressBookId), '/sms/numbers/info/{addressBookId}/{phoneNumber}'));

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}