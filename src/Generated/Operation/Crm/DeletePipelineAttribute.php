<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeletePipelineAttribute
{
    public static function build(
        int $pipelineId,
        int $attributeId,
    ): Request
    {
        $uri = str_replace('{attributeId}', (string) $attributeId, str_replace('{pipelineId}', (string) $pipelineId, '/pipelines/{pipelineId}/attributes/{attributeId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}