<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetPipelineSteps
{
    public static function build(
        int $pipelineId,
    ): Request
    {
        $uri = str_replace('{pipelineId}', (string) $pipelineId, '/pipelines/{pipelineId}/steps');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}