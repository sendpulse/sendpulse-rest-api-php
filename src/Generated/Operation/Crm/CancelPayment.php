<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class CancelPayment
{
    public static function build(
        float $paymentId,
    ): Request
    {
        $uri = str_replace('{paymentId}', rawurlencode((string) $paymentId), '/crm/v1/payments/{paymentId}/cancel');

        return new Request(
            method:  'POST',
            uri:     $uri,
        );
    }
}