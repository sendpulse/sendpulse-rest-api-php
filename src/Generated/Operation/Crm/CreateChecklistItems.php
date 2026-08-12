<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class CreateChecklistItems
{
    public static function build(
        int $checklistId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{checklistId}', (string) $checklistId, '/checklists/{checklistId}/items');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'POST',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}