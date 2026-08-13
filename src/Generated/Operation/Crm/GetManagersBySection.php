<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetManagersBySection
{
    public static function build(
        int $sectionId,
    ): Request
    {
        $uri = str_replace('{sectionId}', (string) $sectionId, '/manager-settings/{sectionId}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}