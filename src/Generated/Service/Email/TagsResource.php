<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Email;

use Sendpulse\RestApi\Generated\Operation\Email\GetTags;
use Sendpulse\RestApi\Generated\Model\Email\TagListResponse;
use Sendpulse\RestApi\Generated\Operation\Email\CreateTag;
use Sendpulse\RestApi\Generated\Model\Email\TagQueueResponse;
use Sendpulse\RestApi\Generated\Operation\Email\UpdateTag;
use Sendpulse\RestApi\Generated\Operation\Email\DeleteTag;
use Sendpulse\RestApi\Generated\Operation\Email\PinTagToEmail;
use Sendpulse\RestApi\Generated\Operation\Email\PinTagToPhone;
use Sendpulse\RestApi\Generated\Operation\Email\UnpinTagFromEmail;
use Sendpulse\RestApi\Generated\Operation\Email\UnpinTagFromPhone;
use Sendpulse\RestApi\Service\AbstractService;

final class TagsResource extends AbstractService
{
    public function getTags(): TagListResponse
    {
        return TagListResponse::fromArray($this->send(GetTags::build()));
    }

    public function createTag(array $body = []): TagQueueResponse
    {
        return TagQueueResponse::fromArray($this->send(CreateTag::build(
            body: $body,
        )));
    }

    public function updateTag(int $id, array $body = []): TagQueueResponse
    {
        return TagQueueResponse::fromArray($this->send(UpdateTag::build(
            id: $id,
            body: $body,
        )));
    }

    public function deleteTag(int $id): TagQueueResponse
    {
        return TagQueueResponse::fromArray($this->send(DeleteTag::build(
            id: $id,
        )));
    }

    public function pinTagToEmail(array $body = []): TagQueueResponse
    {
        return TagQueueResponse::fromArray($this->send(PinTagToEmail::build(
            body: $body,
        )));
    }

    public function pinTagToPhone(array $body = []): TagQueueResponse
    {
        return TagQueueResponse::fromArray($this->send(PinTagToPhone::build(
            body: $body,
        )));
    }

    public function unpinTagFromEmail(array $body = []): TagQueueResponse
    {
        return TagQueueResponse::fromArray($this->send(UnpinTagFromEmail::build(
            body: $body,
        )));
    }

    public function unpinTagFromPhone(array $body = []): TagQueueResponse
    {
        return TagQueueResponse::fromArray($this->send(UnpinTagFromPhone::build(
            body: $body,
        )));
    }
}