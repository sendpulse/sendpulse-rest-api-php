<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteCustomTab
{
    public static function build(
        float $customTabId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{customTabId}', rawurlencode((string) $customTabId), '/crm/v1/custom-tab/{customTabId}');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'DELETE',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}