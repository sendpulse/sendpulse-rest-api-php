<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateCompanyMessenger
{
    public static function build(
        string $entityType,
        int $entityId,
        int $messengerId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{messengerId}', (string) $messengerId, str_replace('{entityId}', (string) $entityId, str_replace('{entityType}', (string) $entityType, '/companies/{companyId}/messengers/{messengerId}')));
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}