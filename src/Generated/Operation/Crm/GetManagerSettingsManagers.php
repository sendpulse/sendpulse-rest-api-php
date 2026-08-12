<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetManagerSettingsManagers
{
    public static function build(): Request
    {
        $uri = '/manager-settings/managers';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}