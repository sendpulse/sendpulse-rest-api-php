<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteContactTag
{
    public static function build(
        int $tagId,
    ): Request
    {
        $uri = str_replace('{tagId}', rawurlencode((string) $tagId), '/crm/v1/contact-tags/{tagId}');

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}