<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteContactAttributeValue
{
    public static function build(
        int $contactId,
        int $attributeId,
    ): Request
    {
        $uri = str_replace('{attributeId}', (string) $attributeId, str_replace('{contactId}', (string) $contactId, '/contacts/{contactId}/attributes/{attributeId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}