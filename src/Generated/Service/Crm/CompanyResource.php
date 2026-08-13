<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetCompaniesShortData;
use Sendpulse\RestApi\Generated\Operation\Crm\GetCompaniesList;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateCompany;
use Sendpulse\RestApi\Generated\Operation\Crm\GetCompanyById;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateCompany;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteCompany;
use Sendpulse\RestApi\Service\AbstractService;

final class CompanyResource extends AbstractService
{
    public function getCompaniesShortData(array $body = []): array
    {
        return $this->send(GetCompaniesShortData::build(
            body: $body,
        ));
    }

    public function getCompaniesList(array $body = []): array
    {
        return $this->send(GetCompaniesList::build(
            body: $body,
        ));
    }

    public function createCompany(array $body = []): array
    {
        return $this->send(CreateCompany::build(
            body: $body,
        ));
    }

    public function getCompanyById(int $companyId): array
    {
        return $this->send(GetCompanyById::build(
            companyId: $companyId,
        ));
    }

    public function updateCompany(int $companyId, array $body = []): array
    {
        return $this->send(UpdateCompany::build(
            companyId: $companyId,
            body: $body,
        ));
    }

    public function deleteCompany(int $companyId): array
    {
        return $this->send(DeleteCompany::build(
            companyId: $companyId,
        ));
    }
}