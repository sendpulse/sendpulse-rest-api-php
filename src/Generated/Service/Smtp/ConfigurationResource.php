<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Smtp;

use Sendpulse\RestApi\Generated\Operation\Smtp\GetSmtpIps;
use Sendpulse\RestApi\Generated\Operation\Smtp\GetSmtpSenders;
use Sendpulse\RestApi\Generated\Operation\Smtp\GetSmtpAllowedDomains;
use Sendpulse\RestApi\Generated\Model\Smtp\DomainList;
use Sendpulse\RestApi\Generated\Operation\Smtp\AddSmtpSender;
use Sendpulse\RestApi\Generated\Model\Smtp\ResultTrue;
use Sendpulse\RestApi\Generated\Operation\Smtp\AddSmtpDomain;
use Sendpulse\RestApi\Generated\Model\Smtp\DomainResult;
use Sendpulse\RestApi\Service\AbstractService;

final class ConfigurationResource extends AbstractService
{
    public function getSmtpIps(): array
    {
        return $this->send(GetSmtpIps::build());
    }

    public function getSmtpSenders(): array
    {
        return $this->send(GetSmtpSenders::build());
    }

    public function getSmtpAllowedDomains(): DomainList
    {
        return DomainList::fromArray($this->send(GetSmtpAllowedDomains::build()));
    }

    public function addSmtpSender(array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(AddSmtpSender::build(
            body: $body,
        )));
    }

    public function addSmtpDomain(string $domain): DomainResult
    {
        return DomainResult::fromArray($this->send(AddSmtpDomain::build(
            domain: $domain,
        )));
    }
}