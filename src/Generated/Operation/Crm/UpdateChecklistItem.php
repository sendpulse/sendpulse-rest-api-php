<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateChecklistItem
{
    public static function build(
        int $checklistId,
        int $itemId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{itemId}', rawurlencode((string) $itemId), str_replace('{checklistId}', rawurlencode((string) $checklistId), '/crm/v1/checklists/{checklistId}/items/{itemId}'));
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}