<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetBoardAttributes;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateBoardAttribute;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateBoardAttribute;
use Sendpulse\RestApi\Service\AbstractService;

final class BoardAttributesResource extends AbstractService
{
    public function getBoardAttributes(int $boardId): array
    {
        return $this->send(GetBoardAttributes::build(
            boardId: $boardId,
        ));
    }

    public function createBoardAttribute(int $boardId, array $body = []): array
    {
        return $this->send(CreateBoardAttribute::build(
            boardId: $boardId,
            body: $body,
        ));
    }

    public function updateBoardAttribute(int $boardId, int $attributeId, array $body = []): array
    {
        return $this->send(UpdateBoardAttribute::build(
            boardId: $boardId,
            attributeId: $attributeId,
            body: $body,
        ));
    }
}