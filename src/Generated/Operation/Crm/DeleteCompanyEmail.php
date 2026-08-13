<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class DeleteCompanyEmail
{
    public static function build(
        int $companyId,
        int $emailId,
    ): Request
    {
        $uri = str_replace('{emailId}', (string) $emailId, str_replace('{companyId}', (string) $companyId, '/companies/{companyId}/emails/{emailId}'));

        return new Request(
            method:  'DELETE',
            uri:     $uri,
        );
    }
}