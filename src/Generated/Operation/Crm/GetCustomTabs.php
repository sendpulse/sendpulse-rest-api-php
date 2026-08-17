<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetCustomTabs
{
    public static function build(): Request
    {
        $uri = '/crm/v1/custom-tab';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}