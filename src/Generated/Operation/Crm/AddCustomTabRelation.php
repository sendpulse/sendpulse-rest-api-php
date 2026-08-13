<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class AddCustomTabRelation
{
    public static function build(
        float $customTabId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{customTabId}', (string) $customTabId, '/custom-tab/{customTabId}/relation');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'POST',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}