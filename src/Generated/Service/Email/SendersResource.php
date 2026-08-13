<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Email;

use Sendpulse\RestApi\Generated\Operation\Email\GetSenders;
use Sendpulse\RestApi\Generated\Model\Email\Sender;
use Sendpulse\RestApi\Generated\Operation\Email\AddSender;
use Sendpulse\RestApi\Generated\Model\Email\ResultTrue;
use Sendpulse\RestApi\Generated\Operation\Email\DeleteSender;
use Sendpulse\RestApi\Generated\Operation\Email\RequestSenderActivationCode;
use Sendpulse\RestApi\Generated\Model\Email\SenderActivationResponse;
use Sendpulse\RestApi\Generated\Operation\Email\ActivateSender;
use Sendpulse\RestApi\Service\AbstractService;

final class SendersResource extends AbstractService
{
    /**
     * @return Sender[]
     */
    public function getSenders(): array
    {
        return array_map(
            static fn(array $item) => Sender::fromArray($item),
            $this->send(GetSenders::build())
        );
    }

    public function addSender(array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(AddSender::build(
            body: $body,
        )));
    }

    public function deleteSender(array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(DeleteSender::build(
            body: $body,
        )));
    }

    public function requestSenderActivationCode(string $email): SenderActivationResponse
    {
        return SenderActivationResponse::fromArray($this->send(RequestSenderActivationCode::build(
            email: $email,
        )));
    }

    public function activateSender(string $email, array $body = []): SenderActivationResponse
    {
        return SenderActivationResponse::fromArray($this->send(ActivateSender::build(
            email: $email,
            body: $body,
        )));
    }
}