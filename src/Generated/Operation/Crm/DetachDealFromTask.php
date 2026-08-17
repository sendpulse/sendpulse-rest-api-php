<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DetachDealFromTask
{
    public static function build(
        int $taskId,
        int $dealId,
    ): Request
    {
        $uri = str_replace('{dealId}', rawurlencode((string) $dealId), str_replace('{taskId}', rawurlencode((string) $taskId), '/crm/v1/task-deals/{taskId}/deal/{dealId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}