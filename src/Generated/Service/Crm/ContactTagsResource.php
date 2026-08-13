<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\AddTagToContact;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteContactTagFromContact;
use Sendpulse\RestApi\Generated\Operation\Crm\ListContactTags;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateContactTag;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateContactTag;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteContactTag;
use Sendpulse\RestApi\Service\AbstractService;

final class ContactTagsResource extends AbstractService
{
    public function addTagToContact(int $tagId, int $contactId): array
    {
        return $this->send(AddTagToContact::build(
            tagId: $tagId,
            contactId: $contactId,
        ));
    }

    public function deleteContactTagFromContact(int $tagId, int $contactId): array
    {
        return $this->send(DeleteContactTagFromContact::build(
            tagId: $tagId,
            contactId: $contactId,
        ));
    }

    public function listContactTags(?string $name = null, ?string $search = null): array
    {
        return $this->send(ListContactTags::build(
            name: $name,
            search: $search,
        ));
    }

    public function createContactTag(array $body = []): array
    {
        return $this->send(CreateContactTag::build(
            body: $body,
        ));
    }

    public function updateContactTag(int $tagId, array $body = []): array
    {
        return $this->send(UpdateContactTag::build(
            tagId: $tagId,
            body: $body,
        ));
    }

    public function deleteContactTag(int $tagId): array
    {
        return $this->send(DeleteContactTag::build(
            tagId: $tagId,
        ));
    }
}