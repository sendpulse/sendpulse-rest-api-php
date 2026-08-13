<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetTaskTags
{
    public static function build(): Request
    {
        $uri = '/task-tags';

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}