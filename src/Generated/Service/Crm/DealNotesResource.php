<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetDealComments;
use Sendpulse\RestApi\Generated\Operation\Crm\AddDealComment;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateDealComment;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteDealComment;
use Sendpulse\RestApi\Service\AbstractService;

final class DealNotesResource extends AbstractService
{
    public function getDealComments(int $dealId): array
    {
        return $this->send(GetDealComments::build(
            dealId: $dealId,
        ));
    }

    public function addDealComment(int $dealId, array $body = []): array
    {
        return $this->send(AddDealComment::build(
            dealId: $dealId,
            body: $body,
        ));
    }

    public function updateDealComment(int $dealId, int $commentId, array $body = []): array
    {
        return $this->send(UpdateDealComment::build(
            dealId: $dealId,
            commentId: $commentId,
            body: $body,
        ));
    }

    public function deleteDealComment(int $dealId, int $commentId): array
    {
        return $this->send(DeleteDealComment::build(
            dealId: $dealId,
            commentId: $commentId,
        ));
    }
}