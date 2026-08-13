<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Sms;

use Sendpulse\RestApi\Http\Request;

final class RemoveSmsBlacklist
{
    public static function build(
        array $body = [],
    ): Request
    {
        $uri = '/sms/black_list';
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'DELETE',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}