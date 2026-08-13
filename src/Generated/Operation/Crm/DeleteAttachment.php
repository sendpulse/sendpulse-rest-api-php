<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteAttachment
{
    public static function build(
        int $attachmentId,
    ): Request
    {
        $uri = str_replace('{attachmentId}', (string) $attachmentId, '/attachments/{attachmentId}');

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}