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
        $uri = str_replace('{attachmentId}', rawurlencode((string) $attachmentId), '/crm/v1/attachments/{attachmentId}');

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}