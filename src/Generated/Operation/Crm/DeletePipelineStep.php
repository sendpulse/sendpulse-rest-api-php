<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeletePipelineStep
{
    public static function build(
        int $pipelineId,
        int $stepId,
    ): Request
    {
        $uri = str_replace('{stepId}', (string) $stepId, str_replace('{pipelineId}', (string) $pipelineId, '/pipelines/{pipelineId}/steps/{stepId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}