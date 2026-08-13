<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetBoards;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateBoard;
use Sendpulse\RestApi\Generated\Operation\Crm\GetBoardById;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateBoard;
use Sendpulse\RestApi\Service\AbstractService;

final class TasksBoardsResource extends AbstractService
{
    public function getBoards(): array
    {
        return $this->send(GetBoards::build());
    }

    public function createBoard(array $body = []): array
    {
        return $this->send(CreateBoard::build(
            body: $body,
        ));
    }

    public function getBoardById(int $boardId): array
    {
        return $this->send(GetBoardById::build(
            boardId: $boardId,
        ));
    }

    public function updateBoard(int $boardId, array $body = []): array
    {
        return $this->send(UpdateBoard::build(
            boardId: $boardId,
            body: $body,
        ));
    }
}