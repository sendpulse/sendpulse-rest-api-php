<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Smtp;

use Sendpulse\RestApi\Generated\Operation\Smtp\GetSmtpEmails;
use Sendpulse\RestApi\Generated\Model\Smtp\EmailRecord;
use Sendpulse\RestApi\Generated\Operation\Smtp\SendSmtpEmail;
use Sendpulse\RestApi\Generated\Model\Smtp\SentEmail;
use Sendpulse\RestApi\Generated\Operation\Smtp\GetSmtpEmailsTotal;
use Sendpulse\RestApi\Generated\Model\Smtp\TotalCount;
use Sendpulse\RestApi\Generated\Operation\Smtp\GetSmtpEmailInfo;
use Sendpulse\RestApi\Generated\Operation\Smtp\GetSmtpEmailsBatchInfo;
use Sendpulse\RestApi\Service\AbstractService;

final class EmailsResource extends AbstractService
{
    /**
     * @return EmailRecord[]
     */
    public function getSmtpEmails(?int $limit = null, ?int $offset = null, ?string $from = null, ?string $to = null, ?string $sender = null, ?string $recipient = null, ?string $country = null): array
    {
        return array_map(
            static fn(array $item) => EmailRecord::fromArray($item),
            $this->send(GetSmtpEmails::build(
            limit: $limit,
            offset: $offset,
            from: $from,
            to: $to,
            sender: $sender,
            recipient: $recipient,
            country: $country,
        ))
        );
    }

    public function sendSmtpEmail(array $body = []): SentEmail
    {
        return SentEmail::fromArray($this->send(SendSmtpEmail::build(
            body: $body,
        )));
    }

    public function getSmtpEmailsTotal(): TotalCount
    {
        return TotalCount::fromArray($this->send(GetSmtpEmailsTotal::build()));
    }

    public function getSmtpEmailInfo(string $id): EmailRecord
    {
        return EmailRecord::fromArray($this->send(GetSmtpEmailInfo::build(
            id: $id,
        )));
    }

    /**
     * @return EmailRecord[]
     */
    public function getSmtpEmailsBatchInfo(array $body = []): array
    {
        return array_map(
            static fn(array $item) => EmailRecord::fromArray($item),
            $this->send(GetSmtpEmailsBatchInfo::build(
            body: $body,
        ))
        );
    }
}