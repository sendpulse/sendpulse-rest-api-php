<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetCompanyMessengers;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateCompanyMessenger;
use Sendpulse\RestApi\Generated\Operation\Crm\BatchCreateCompanyMessengers;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateCompanyMessenger;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteCompanyMessenger;
use Sendpulse\RestApi\Service\AbstractService;

final class MessengersResource extends AbstractService
{
    public function getCompanyMessengers(int $companyId): array
    {
        return $this->send(GetCompanyMessengers::build(
            companyId: $companyId,
        ));
    }

    public function createCompanyMessenger(string $entityType, int $entityId, array $body = []): array
    {
        return $this->send(CreateCompanyMessenger::build(
            entityType: $entityType,
            entityId: $entityId,
            body: $body,
        ));
    }

    public function batchCreateCompanyMessengers(int $companyId, array $body = []): array
    {
        return $this->send(BatchCreateCompanyMessengers::build(
            companyId: $companyId,
            body: $body,
        ));
    }

    public function updateCompanyMessenger(string $entityType, int $entityId, int $messengerId, array $body = []): array
    {
        return $this->send(UpdateCompanyMessenger::build(
            entityType: $entityType,
            entityId: $entityId,
            messengerId: $messengerId,
            body: $body,
        ));
    }

    public function deleteCompanyMessenger(string $entityType, int $entityId, int $messengerId): array
    {
        return $this->send(DeleteCompanyMessenger::build(
            entityType: $entityType,
            entityId: $entityId,
            messengerId: $messengerId,
        ));
    }
}