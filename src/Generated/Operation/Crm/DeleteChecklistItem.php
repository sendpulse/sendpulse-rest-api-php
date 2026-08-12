<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteChecklistItem
{
    public static function build(
        int $checklistId,
        int $itemId,
    ): Request
    {
        $uri = str_replace('{itemId}', (string) $itemId, str_replace('{checklistId}', (string) $checklistId, '/checklists/{checklistId}/items/{itemId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}