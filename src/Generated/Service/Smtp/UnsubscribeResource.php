<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Smtp;

use Sendpulse\RestApi\Generated\Operation\Smtp\GetSmtpUnsubscribed;
use Sendpulse\RestApi\Generated\Operation\Smtp\UnsubscribeSmtpRecipients;
use Sendpulse\RestApi\Generated\Model\Smtp\ResultTrue;
use Sendpulse\RestApi\Generated\Operation\Smtp\RemoveSmtpUnsubscribe;
use Sendpulse\RestApi\Generated\Operation\Smtp\SearchSmtpUnsubscribe;
use Sendpulse\RestApi\Generated\Operation\Smtp\ResubscribeSmtpRecipient;
use Sendpulse\RestApi\Generated\Model\Smtp\SentEmail;
use Sendpulse\RestApi\Service\AbstractService;

final class UnsubscribeResource extends AbstractService
{
    public function getSmtpUnsubscribed(?string $date = null, ?int $limit = null, ?int $offset = null): array
    {
        return $this->send(GetSmtpUnsubscribed::build(
            date: $date,
            limit: $limit,
            offset: $offset,
        ));
    }

    public function unsubscribeSmtpRecipients(array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(UnsubscribeSmtpRecipients::build(
            body: $body,
        )));
    }

    public function removeSmtpUnsubscribe(array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(RemoveSmtpUnsubscribe::build(
            body: $body,
        )));
    }

    public function searchSmtpUnsubscribe(string $email): ResultTrue
    {
        return ResultTrue::fromArray($this->send(SearchSmtpUnsubscribe::build(
            email: $email,
        )));
    }

    public function resubscribeSmtpRecipient(array $body = []): SentEmail
    {
        return SentEmail::fromArray($this->send(ResubscribeSmtpRecipient::build(
            body: $body,
        )));
    }
}