<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateAttachment
{
    public static function build(
        int $attachmentId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{attachmentId}', rawurlencode((string) $attachmentId), '/crm/v1/attachments/{attachmentId}');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}