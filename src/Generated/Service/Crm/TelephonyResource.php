<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetTelephonyCalls;
use Sendpulse\RestApi\Generated\Operation\Crm\GetContactCalls;
use Sendpulse\RestApi\Generated\Operation\Crm\GetDealCalls;
use Sendpulse\RestApi\Generated\Operation\Crm\AttachCallToDeal;
use Sendpulse\RestApi\Service\AbstractService;

final class TelephonyResource extends AbstractService
{
    public function getTelephonyCalls(array $body = []): array
    {
        return $this->send(GetTelephonyCalls::build(
            body: $body,
        ));
    }

    public function getContactCalls(int $contactId, array $body = []): array
    {
        return $this->send(GetContactCalls::build(
            contactId: $contactId,
            body: $body,
        ));
    }

    public function getDealCalls(int $dealId, array $body = []): array
    {
        return $this->send(GetDealCalls::build(
            dealId: $dealId,
            body: $body,
        ));
    }

    public function attachCallToDeal(int $dealId, array $body = []): array
    {
        return $this->send(AttachCallToDeal::build(
            dealId: $dealId,
            body: $body,
        ));
    }
}