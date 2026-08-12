<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\CreateChecklistItems;
use Sendpulse\RestApi\Generated\Operation\Crm\ReorderChecklistItem;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateChecklistItem;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteChecklistItem;
use Sendpulse\RestApi\Service\AbstractService;

final class ChecklistItemsResource extends AbstractService
{
    public function createChecklistItems(int $checklistId, array $body = []): array
    {
        return $this->send(CreateChecklistItems::build(
            checklistId: $checklistId,
            body: $body,
        ));
    }

    public function reorderChecklistItem(int $checklistId, int $itemId, array $body = []): array
    {
        return $this->send(ReorderChecklistItem::build(
            checklistId: $checklistId,
            itemId: $itemId,
            body: $body,
        ));
    }

    public function updateChecklistItem(int $checklistId, int $itemId, array $body = []): array
    {
        return $this->send(UpdateChecklistItem::build(
            checklistId: $checklistId,
            itemId: $itemId,
            body: $body,
        ));
    }

    public function deleteChecklistItem(int $checklistId, int $itemId): array
    {
        return $this->send(DeleteChecklistItem::build(
            checklistId: $checklistId,
            itemId: $itemId,
        ));
    }
}