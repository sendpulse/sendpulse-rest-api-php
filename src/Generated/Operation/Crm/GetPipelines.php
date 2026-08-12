<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetPipelines
{
    public static function build(): Request
    {
        $uri = '/pipelines';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}