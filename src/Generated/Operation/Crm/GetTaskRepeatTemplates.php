<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetTaskRepeatTemplates
{
    public static function build(): Request
    {
        $uri = '/tasks-repeat/templates';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}