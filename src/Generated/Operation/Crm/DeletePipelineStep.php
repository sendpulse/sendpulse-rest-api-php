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
        $uri = str_replace('{stepId}', rawurlencode((string) $stepId), str_replace('{pipelineId}', rawurlencode((string) $pipelineId), '/crm/v1/pipelines/{pipelineId}/steps/{stepId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}