<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetCustomTabs;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateCustomTab;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateCustomTab;
use Sendpulse\RestApi\Generated\Model\Crm\CustomTab;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteCustomTab;
use Sendpulse\RestApi\Generated\Operation\Crm\AddCustomTabRelation;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteCustomTabRelation;
use Sendpulse\RestApi\Service\AbstractService;

final class CustomTabResource extends AbstractService
{
    public function getCustomTabs(): array
    {
        return $this->send(GetCustomTabs::build());
    }

    public function createCustomTab(array $body = []): array
    {
        return $this->send(CreateCustomTab::build(
            body: $body,
        ));
    }

    public function updateCustomTab(float $customTabId, array $body = []): CustomTab
    {
        return CustomTab::fromArray($this->send(UpdateCustomTab::build(
            customTabId: $customTabId,
            body: $body,
        )));
    }

    public function deleteCustomTab(float $customTabId, array $body = []): array
    {
        return $this->send(DeleteCustomTab::build(
            customTabId: $customTabId,
            body: $body,
        ));
    }

    public function addCustomTabRelation(float $customTabId, array $body = []): array
    {
        return $this->send(AddCustomTabRelation::build(
            customTabId: $customTabId,
            body: $body,
        ));
    }

    public function deleteCustomTabRelation(float $customTabId, array $body = []): array
    {
        return $this->send(DeleteCustomTabRelation::build(
            customTabId: $customTabId,
            body: $body,
        ));
    }
}