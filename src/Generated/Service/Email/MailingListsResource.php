<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Email;

use Sendpulse\RestApi\Generated\Operation\Email\GetMailingLists;
use Sendpulse\RestApi\Generated\Model\Email\MailingList;
use Sendpulse\RestApi\Generated\Operation\Email\CreateMailingList;
use Sendpulse\RestApi\Generated\Model\Email\MailingListId;
use Sendpulse\RestApi\Generated\Operation\Email\GetMailingListById;
use Sendpulse\RestApi\Generated\Operation\Email\UpdateMailingList;
use Sendpulse\RestApi\Generated\Model\Email\ResultTrue;
use Sendpulse\RestApi\Generated\Operation\Email\DeleteMailingList;
use Sendpulse\RestApi\Generated\Operation\Email\GetMailingListVariables;
use Sendpulse\RestApi\Generated\Model\Email\VariableDefinition;
use Sendpulse\RestApi\Generated\Operation\Email\GetEmailsFromMailingList;
use Sendpulse\RestApi\Generated\Model\Email\EmailContact;
use Sendpulse\RestApi\Generated\Operation\Email\AddEmailsToMailingList;
use Sendpulse\RestApi\Generated\Operation\Email\DeleteEmailsFromMailingList;
use Sendpulse\RestApi\Generated\Operation\Email\GetEmailsTotalCount;
use Sendpulse\RestApi\Generated\Model\Email\TotalCount;
use Sendpulse\RestApi\Generated\Operation\Email\UnsubscribeEmailsFromMailingList;
use Sendpulse\RestApi\Generated\Operation\Email\GetContactsByVariable;
use Sendpulse\RestApi\Generated\Model\Email\EmailContactBasic;
use Sendpulse\RestApi\Generated\Operation\Email\UpdateContactPhone;
use Sendpulse\RestApi\Generated\Operation\Email\GetCampaignCostByList;
use Sendpulse\RestApi\Generated\Model\Email\CampaignCost;
use Sendpulse\RestApi\Service\AbstractService;

final class MailingListsResource extends AbstractService
{
    /**
     * @return MailingList[]
     */
    public function getMailingLists(?int $limit = null, ?int $offset = null): array
    {
        return array_map(
            static fn(array $item) => MailingList::fromArray($item),
            $this->send(GetMailingLists::build(
            limit: $limit,
            offset: $offset,
        ))
        );
    }

    public function createMailingList(array $body = []): MailingListId
    {
        return MailingListId::fromArray($this->send(CreateMailingList::build(
            body: $body,
        )));
    }

    /**
     * @return MailingList[]
     */
    public function getMailingListById(int $id): array
    {
        return array_map(
            static fn(array $item) => MailingList::fromArray($item),
            $this->send(GetMailingListById::build(
            id: $id,
        ))
        );
    }

    public function updateMailingList(int $id, array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(UpdateMailingList::build(
            id: $id,
            body: $body,
        )));
    }

    public function deleteMailingList(int $id): ResultTrue
    {
        return ResultTrue::fromArray($this->send(DeleteMailingList::build(
            id: $id,
        )));
    }

    /**
     * @return VariableDefinition[]
     */
    public function getMailingListVariables(int $id): array
    {
        return array_map(
            static fn(array $item) => VariableDefinition::fromArray($item),
            $this->send(GetMailingListVariables::build(
            id: $id,
        ))
        );
    }

    /**
     * @return EmailContact[]
     */
    public function getEmailsFromMailingList(int $id, ?int $limit = null, ?int $offset = null, ?string $order = null, ?bool $active = null, ?bool $not_active = null): array
    {
        return array_map(
            static fn(array $item) => EmailContact::fromArray($item),
            $this->send(GetEmailsFromMailingList::build(
            id: $id,
            limit: $limit,
            offset: $offset,
            order: $order,
            active: $active,
            not_active: $not_active,
        ))
        );
    }

    public function addEmailsToMailingList(int $id, array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(AddEmailsToMailingList::build(
            id: $id,
            body: $body,
        )));
    }

    public function deleteEmailsFromMailingList(int $id, array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(DeleteEmailsFromMailingList::build(
            id: $id,
            body: $body,
        )));
    }

    public function getEmailsTotalCount(int $id, ?bool $active = null): TotalCount
    {
        return TotalCount::fromArray($this->send(GetEmailsTotalCount::build(
            id: $id,
            active: $active,
        )));
    }

    public function unsubscribeEmailsFromMailingList(int $id, array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(UnsubscribeEmailsFromMailingList::build(
            id: $id,
            body: $body,
        )));
    }

    /**
     * @return EmailContactBasic[]
     */
    public function getContactsByVariable(int $id, string $variableName, string $searchValue): array
    {
        return array_map(
            static fn(array $item) => EmailContactBasic::fromArray($item),
            $this->send(GetContactsByVariable::build(
            id: $id,
            variableName: $variableName,
            searchValue: $searchValue,
        ))
        );
    }

    public function updateContactPhone(int $id, array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(UpdateContactPhone::build(
            id: $id,
            body: $body,
        )));
    }

    public function getCampaignCostByList(int $id): CampaignCost
    {
        return CampaignCost::fromArray($this->send(GetCampaignCostByList::build(
            id: $id,
        )));
    }
}