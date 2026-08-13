<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\ListManagerSettingsSections;
use Sendpulse\RestApi\Generated\Operation\Crm\GetManagerSettingsManagers;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateManagerSettings;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateManagerSetting;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteManagersFromManagerSetting;
use Sendpulse\RestApi\Generated\Operation\Crm\GetManagersBySection;
use Sendpulse\RestApi\Service\AbstractService;

final class ManagerSettingsResource extends AbstractService
{
    public function listManagerSettingsSections(): array
    {
        return $this->send(ListManagerSettingsSections::build());
    }

    public function getManagerSettingsManagers(): array
    {
        return $this->send(GetManagerSettingsManagers::build());
    }

    public function createManagerSettings(array $body = []): array
    {
        return $this->send(CreateManagerSettings::build(
            body: $body,
        ));
    }

    public function updateManagerSetting(int $settingId, array $body = []): array
    {
        return $this->send(UpdateManagerSetting::build(
            settingId: $settingId,
            body: $body,
        ));
    }

    public function deleteManagersFromManagerSetting(int $settingId, array $body = []): array
    {
        return $this->send(DeleteManagersFromManagerSetting::build(
            settingId: $settingId,
            body: $body,
        ));
    }

    public function getManagersBySection(int $sectionId): array
    {
        return $this->send(GetManagersBySection::build(
            sectionId: $sectionId,
        ));
    }
}