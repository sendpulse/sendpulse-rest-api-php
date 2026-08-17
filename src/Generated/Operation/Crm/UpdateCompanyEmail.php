<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class UpdateCompanyEmail
{
    public static function build(
        int $companyId,
        int $emailId,
        array $body = [],
    ): Request
    {
        $uri = str_replace('{emailId}', rawurlencode((string) $emailId), str_replace('{companyId}', rawurlencode((string) $companyId), '/crm/v1/companies/{companyId}/emails/{emailId}'));
        $encodedBody = $body ? json_encode($body, JSON_THROW_ON_ERROR) : null;

        return new Request(
            method:  'PUT',
            uri:     $uri,
            body:    $encodedBody,
        );
    }
}