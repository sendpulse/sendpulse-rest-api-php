<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class CreatePipelineAttribute
{
    public static function build(
        int $pipelineId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{pipelineId}', (string) $pipelineId, '/pipelines/{pipelineId}/attributes');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'POST',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}