<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteDealAttribute
{
    public static function build(
        int $dealId,
        int $attributeId,
    ): Request
    {
        $uri = str_replace('{attributeId}', (string) $attributeId, str_replace('{dealId}', (string) $dealId, '/deals/{dealId}/attributes/{attributeId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}