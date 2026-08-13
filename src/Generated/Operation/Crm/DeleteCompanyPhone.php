<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteCompanyPhone
{
    public static function build(
        string $entityType,
        int $entityId,
        int $phoneId,
    ): Request
    {
        $uri = str_replace('{phoneId}', (string) $phoneId, str_replace('{entityId}', (string) $entityId, str_replace('{entityType}', (string) $entityType, '/companies/{companyId}/phones/{phoneId}')));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}