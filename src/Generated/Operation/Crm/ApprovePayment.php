<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class ApprovePayment
{
    public static function build(
        float $paymentId,
    ): Request
    {
        $uri = str_replace('{paymentId}', (string) $paymentId, '/payments/{paymentId}/approve');

        return new Request(
            method:  'POST',
            uri:     $uri,
        );
    }
}