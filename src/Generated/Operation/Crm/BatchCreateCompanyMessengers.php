<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class BatchCreateCompanyMessengers
{
    public static function build(
        int $companyId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{companyId}', (string) $companyId, '/companies/{companyId}/messengers/batch');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'POST',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}