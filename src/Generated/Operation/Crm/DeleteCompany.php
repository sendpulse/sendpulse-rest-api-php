<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteCompany
{
    public static function build(
        int $companyId,
    ): Request
    {
        $uri = str_replace('{companyId}', (string) $companyId, '/companies/{companyId}');

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}