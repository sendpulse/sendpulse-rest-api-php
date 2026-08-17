<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class AddContactCompanyRelation
{
    public static function build(
        int $contactId,
        int $companyId,
    ): Request
    {
        $uri = str_replace('{companyId}', rawurlencode((string) $companyId), str_replace('{contactId}', rawurlencode((string) $contactId), '/crm/v1/contacts/{contactId}/relation/{companyId}'));

        return new Request(
            method:  'POST',
            uri:     $uri,
        );
    }
}