<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetCompanyPhones
{
    public static function build(
        int $companyId,
    ): Request
    {
        $uri = str_replace('{companyId}', rawurlencode((string) $companyId), '/crm/v1/companies/{companyId}/phones');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}