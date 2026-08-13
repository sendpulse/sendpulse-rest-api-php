<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetCompanyAttributes;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateCompanyAttribute;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateCompanyAttribute;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteCompanyAttribute;
use Sendpulse\RestApi\Service\AbstractService;

final class CompanyAttributesResource extends AbstractService
{
    public function getCompanyAttributes(): array
    {
        return $this->send(GetCompanyAttributes::build());
    }

    public function createCompanyAttribute(array $body = []): array
    {
        return $this->send(CreateCompanyAttribute::build(
            body: $body,
        ));
    }

    public function updateCompanyAttribute(int $attributeId, array $body = []): array
    {
        return $this->send(UpdateCompanyAttribute::build(
            attributeId: $attributeId,
            body: $body,
        ));
    }

    public function deleteCompanyAttribute(int $attributeId): array
    {
        return $this->send(DeleteCompanyAttribute::build(
            attributeId: $attributeId,
        ));
    }
}