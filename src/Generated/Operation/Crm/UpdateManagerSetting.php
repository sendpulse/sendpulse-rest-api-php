<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateManagerSetting
{
    public static function build(
        int $settingId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{settingId}', (string) $settingId, '/manager-settings/{settingId}');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}