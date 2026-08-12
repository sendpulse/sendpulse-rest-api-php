<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetCompanyEmails;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateCompanyEmail;
use Sendpulse\RestApi\Generated\Operation\Crm\BatchCreateCompanyEmails;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateCompanyEmail;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteCompanyEmail;
use Sendpulse\RestApi\Service\AbstractService;

final class EmailsResource extends AbstractService
{
    public function getCompanyEmails(string $entityType, int $entityId): array
    {
        return $this->send(GetCompanyEmails::build(
            entityType: $entityType,
            entityId: $entityId,
        ));
    }

    public function createCompanyEmail(string $entityType, int $entityId, array $body = []): array
    {
        return $this->send(CreateCompanyEmail::build(
            entityType: $entityType,
            entityId: $entityId,
            body: $body,
        ));
    }

    public function batchCreateCompanyEmails(int $companyId, array $body = []): array
    {
        return $this->send(BatchCreateCompanyEmails::build(
            companyId: $companyId,
            body: $body,
        ));
    }

    public function updateCompanyEmail(int $companyId, int $emailId, array $body = []): array
    {
        return $this->send(UpdateCompanyEmail::build(
            companyId: $companyId,
            emailId: $emailId,
            body: $body,
        ));
    }

    public function deleteCompanyEmail(int $companyId, int $emailId): array
    {
        return $this->send(DeleteCompanyEmail::build(
            companyId: $companyId,
            emailId: $emailId,
        ));
    }
}