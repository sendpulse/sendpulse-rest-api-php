<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DetachContactFromTask
{
    public static function build(
        int $taskId,
        int $contactId,
    ): Request
    {
        $uri = str_replace('{contactId}', (string) $contactId, str_replace('{taskId}', (string) $taskId, '/task-contacts/{taskId}/contact/{contactId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}