<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Sms;

use Sendpulse\RestApi\Generated\Operation\Sms\AddSmsNumbers;
use Sendpulse\RestApi\Generated\Model\Sms\NumbersImport;
use Sendpulse\RestApi\Generated\Operation\Sms\UpdateSmsVariablesBatch;
use Sendpulse\RestApi\Generated\Operation\Sms\RemoveSmsNumbers;
use Sendpulse\RestApi\Generated\Model\Sms\NumbersRemoval;
use Sendpulse\RestApi\Generated\Operation\Sms\AddSmsNumbersWithVariables;
use Sendpulse\RestApi\Generated\Operation\Sms\UpdateContactPhone;
use Sendpulse\RestApi\Generated\Model\Sms\ResultTrue;
use Sendpulse\RestApi\Generated\Operation\Sms\UpdateSmsVariablesSingle;
use Sendpulse\RestApi\Generated\Operation\Sms\GetSmsNumberInfo;
use Sendpulse\RestApi\Service\AbstractService;

final class ContactsResource extends AbstractService
{
    public function addSmsNumbers(array $body = []): NumbersImport
    {
        return NumbersImport::fromArray($this->send(AddSmsNumbers::build(
            body: $body,
        )));
    }

    public function updateSmsVariablesBatch(array $body = []): array
    {
        return $this->send(UpdateSmsVariablesBatch::build(
            body: $body,
        ));
    }

    public function removeSmsNumbers(array $body = []): NumbersRemoval
    {
        return NumbersRemoval::fromArray($this->send(RemoveSmsNumbers::build(
            body: $body,
        )));
    }

    public function addSmsNumbersWithVariables(array $body = []): array
    {
        return $this->send(AddSmsNumbersWithVariables::build(
            body: $body,
        ));
    }

    public function updateContactPhone(int $id, array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(UpdateContactPhone::build(
            id: $id,
            body: $body,
        )));
    }

    public function updateSmsVariablesSingle(int $id, array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(UpdateSmsVariablesSingle::build(
            id: $id,
            body: $body,
        )));
    }

    public function getSmsNumberInfo(int $addressBookId, string $phoneNumber): array
    {
        return $this->send(GetSmsNumberInfo::build(
            addressBookId: $addressBookId,
            phoneNumber: $phoneNumber,
        ));
    }
}