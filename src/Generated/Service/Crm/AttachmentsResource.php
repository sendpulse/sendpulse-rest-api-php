<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\CreateAttachment;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateAttachmentsBatch;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateAttachment;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteAttachment;
use Sendpulse\RestApi\Service\AbstractService;

final class AttachmentsResource extends AbstractService
{
    public function createAttachment(array $body = []): array
    {
        return $this->send(CreateAttachment::build(
            body: $body,
        ));
    }

    public function createAttachmentsBatch(array $body = []): array
    {
        return $this->send(CreateAttachmentsBatch::build(
            body: $body,
        ));
    }

    public function updateAttachment(int $attachmentId, array $body = []): array
    {
        return $this->send(UpdateAttachment::build(
            attachmentId: $attachmentId,
            body: $body,
        ));
    }

    public function deleteAttachment(int $attachmentId): array
    {
        return $this->send(DeleteAttachment::build(
            attachmentId: $attachmentId,
        ));
    }
}