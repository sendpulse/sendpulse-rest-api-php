<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteCompanyMessenger
{
    public static function build(
        string $entityType,
        int $entityId,
        int $messengerId,
    ): Request
    {
        $uri = str_replace('{messengerId}', (string) $messengerId, str_replace('{entityId}', (string) $entityId, str_replace('{entityType}', (string) $entityType, '/companies/{companyId}/messengers/{messengerId}')));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}