<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateDealAttributeValue
{
    public static function build(
        int $dealId,
        int $attributeId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{attributeId}', (string) $attributeId, str_replace('{dealId}', (string) $dealId, '/deals/{dealId}/attributes/{attributeId}'));
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}