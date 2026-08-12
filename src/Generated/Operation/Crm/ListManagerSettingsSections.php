<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class ListManagerSettingsSections
{
    public static function build(): Request
    {
        $uri = '/manager-settings/sections';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}