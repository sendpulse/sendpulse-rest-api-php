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
        $uri = str_replace('{attributeId}', rawurlencode((string) $attributeId), str_replace('{contactId}', rawurlencode((string) $contactId), '/crm/v1/contacts/{contactId}/attributes/{attributeId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}