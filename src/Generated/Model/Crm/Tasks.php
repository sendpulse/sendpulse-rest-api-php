<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class Tasks
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly ?string $name = null,
        public readonly ?int $userId = null,
        public readonly ?int $responsibleId = null,
        public readonly ?int $parentId = null,
        public readonly ?int $boardId = null,
        public readonly ?int $stepId = null,
        public readonly ?int $priority = null,
        public readonly ?int $order = null,
        public readonly ?int $description = null,
        public readonly ?string $alert = null,
        public readonly ?int $repeat = null,
        public readonly ?string $startAt = null,
        public readonly ?string $finishAt = null,
        public readonly ?array $observers = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\TaskChecklist $checklists = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\EntityAttachment $attachments = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\Attributes $attributes = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\TaskComment $comments = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\TaskHistory $histories = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\TaskTag $tags = null,
        public readonly ?array $deals = null,
        public readonly ?array $tasks = null,
        public readonly ?array $contacts = null,
        public readonly ?array $subTasks = null,
        public readonly ?float $updatedDaysAt = null,
        public readonly ?float $createdDaysAt = null,
        public readonly ?string $createdAt = null,
        public readonly ?string $updatedAt = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? null,
            userId: $data['userId'] ?? null,
            responsibleId: $data['responsibleId'] ?? null,
            parentId: $data['parentId'] ?? null,
            boardId: $data['boardId'] ?? null,
            stepId: $data['stepId'] ?? null,
            priority: $data['priority'] ?? null,
            order: $data['order'] ?? null,
            description: $data['description'] ?? null,
            alert: $data['alert'] ?? null,
            repeat: $data['repeat'] ?? null,
            startAt: $data['startAt'] ?? null,
            finishAt: $data['finishAt'] ?? null,
            observers: $data['observers'] ?? null,
            checklists: isset($data['checklists']) && is_array($data['checklists']) ? TaskChecklist::fromArray($data['checklists']) : null,
            attachments: isset($data['attachments']) && is_array($data['attachments']) ? EntityAttachment::fromArray($data['attachments']) : null,
            attributes: isset($data['attributes']) && is_array($data['attributes']) ? Attributes::fromArray($data['attributes']) : null,
            comments: isset($data['comments']) && is_array($data['comments']) ? TaskComment::fromArray($data['comments']) : null,
            histories: isset($data['histories']) && is_array($data['histories']) ? TaskHistory::fromArray($data['histories']) : null,
            tags: isset($data['tags']) && is_array($data['tags']) ? TaskTag::fromArray($data['tags']) : null,
            deals: $data['deals'] ?? null,
            tasks: $data['tasks'] ?? null,
            contacts: $data['contacts'] ?? null,
            subTasks: $data['subTasks'] ?? null,
            updatedDaysAt: $data['updatedDaysAt'] ?? null,
            createdDaysAt: $data['createdDaysAt'] ?? null,
            createdAt: $data['createdAt'] ?? null,
            updatedAt: $data['updatedAt'] ?? null,
        );
    }
}