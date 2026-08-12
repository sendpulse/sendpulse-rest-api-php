<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetAllPayments;
use Sendpulse\RestApi\Generated\Operation\Crm\GetDealPayments;
use Sendpulse\RestApi\Generated\Operation\Crm\GetPaymentsByContactId;
use Sendpulse\RestApi\Generated\Operation\Crm\CreatePayment;
use Sendpulse\RestApi\Generated\Operation\Crm\ApprovePayment;
use Sendpulse\RestApi\Generated\Operation\Crm\CancelPayment;
use Sendpulse\RestApi\Service\AbstractService;

final class PaymentsResource extends AbstractService
{
    public function getAllPayments(): array
    {
        return $this->send(GetAllPayments::build());
    }

    public function getDealPayments(): array
    {
        return $this->send(GetDealPayments::build());
    }

    public function getPaymentsByContactId(): array
    {
        return $this->send(GetPaymentsByContactId::build());
    }

    public function createPayment(array $body = []): array
    {
        return $this->send(CreatePayment::build(
            body: $body,
        ));
    }

    public function approvePayment(float $paymentId): array
    {
        return $this->send(ApprovePayment::build(
            paymentId: $paymentId,
        ));
    }

    public function cancelPayment(float $paymentId): array
    {
        return $this->send(CancelPayment::build(
            paymentId: $paymentId,
        ));
    }
}