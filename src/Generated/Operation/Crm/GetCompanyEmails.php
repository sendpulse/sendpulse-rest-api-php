<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetCompanyEmails
{
    public static function build(
        string $entityType,
        int $entityId,
    ): Request
    {
        $uri = str_replace('{entityId}', rawurlencode((string) $entityId), str_replace('{entityType}', rawurlencode((string) $entityType), '/crm/v1/companies/{companyId}/emails'));

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}