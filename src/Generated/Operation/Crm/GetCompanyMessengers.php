<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetCompanyMessengers
{
    public static function build(
        int $companyId,
    ): Request
    {
        $uri = str_replace('{companyId}', rawurlencode((string) $companyId), '/crm/v1/companies/{companyId}/messengers');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}