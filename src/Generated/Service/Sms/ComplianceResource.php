<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Sms;

use Sendpulse\RestApi\Generated\Operation\Sms\GetSmsBlacklist;
use Sendpulse\RestApi\Generated\Operation\Sms\AddSmsBlacklist;
use Sendpulse\RestApi\Generated\Operation\Sms\RemoveSmsBlacklist;
use Sendpulse\RestApi\Service\AbstractService;

final class ComplianceResource extends AbstractService
{
    public function getSmsBlacklist(): array
    {
        return $this->send(GetSmsBlacklist::build());
    }

    public function addSmsBlacklist(array $body = []): array
    {
        return $this->send(AddSmsBlacklist::build(
            body: $body,
        ));
    }

    public function removeSmsBlacklist(array $body = []): array
    {
        return $this->send(RemoveSmsBlacklist::build(
            body: $body,
        ));
    }
}