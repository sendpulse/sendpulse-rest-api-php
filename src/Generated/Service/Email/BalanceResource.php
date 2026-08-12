<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Email;

use Sendpulse\RestApi\Generated\Operation\Email\GetBalance;
use Sendpulse\RestApi\Generated\Model\Email\BalanceResponse;
use Sendpulse\RestApi\Generated\Operation\Email\GetBalanceByCurrency;
use Sendpulse\RestApi\Generated\Operation\Email\GetDetailedBalance;
use Sendpulse\RestApi\Generated\Model\Email\DetailedBalanceResponse;
use Sendpulse\RestApi\Service\AbstractService;

final class BalanceResource extends AbstractService
{
    public function getBalance(): BalanceResponse
    {
        return BalanceResponse::fromArray($this->send(GetBalance::build()));
    }

    public function getBalanceByCurrency(string $currency): BalanceResponse
    {
        return BalanceResponse::fromArray($this->send(GetBalanceByCurrency::build(
            currency: $currency,
        )));
    }

    public function getDetailedBalance(): DetailedBalanceResponse
    {
        return DetailedBalanceResponse::fromArray($this->send(GetDetailedBalance::build()));
    }
}