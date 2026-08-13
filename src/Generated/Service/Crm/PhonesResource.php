<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetCompanyPhones;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateCompanyPhone;
use Sendpulse\RestApi\Generated\Operation\Crm\BatchCreateCompanyPhones;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateCompanyPhone;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteCompanyPhone;
use Sendpulse\RestApi\Service\AbstractService;

final class PhonesResource extends AbstractService
{
    public function getCompanyPhones(int $companyId): array
    {
        return $this->send(GetCompanyPhones::build(
            companyId: $companyId,
        ));
    }

    public function createCompanyPhone(int $companyId, array $body = []): array
    {
        return $this->send(CreateCompanyPhone::build(
            companyId: $companyId,
            body: $body,
        ));
    }

    public function batchCreateCompanyPhones(int $companyId, array $body = []): array
    {
        return $this->send(BatchCreateCompanyPhones::build(
            companyId: $companyId,
            body: $body,
        ));
    }

    public function updateCompanyPhone(string $entityType, int $entityId, int $phoneId, array $body = []): array
    {
        return $this->send(UpdateCompanyPhone::build(
            entityType: $entityType,
            entityId: $entityId,
            phoneId: $phoneId,
            body: $body,
        ));
    }

    public function deleteCompanyPhone(string $entityType, int $entityId, int $phoneId): array
    {
        return $this->send(DeleteCompanyPhone::build(
            entityType: $entityType,
            entityId: $entityId,
            phoneId: $phoneId,
        ));
    }
}