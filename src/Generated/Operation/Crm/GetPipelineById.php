<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class GetPipelineById
{
    public static function build(
        int $pipelineId,
    ): Request
    {
        $uri = str_replace('{pipelineId}', rawurlencode((string) $pipelineId), '/crm/v1/pipelines/{pipelineId}');

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}