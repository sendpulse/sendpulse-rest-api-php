<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class BatchStoreContactAttributeValues
{
    public static function build(
        int $contactId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{contactId}', rawurlencode((string) $contactId), '/crm/v1/contacts/{contactId}/attributes/batch');
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'POST',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}