<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\CreateTaskAttributeValue;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateTaskAttributeValue;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteAttributeValue;
use Sendpulse\RestApi\Service\AbstractService;

final class TaskAttributesResource extends AbstractService
{
    public function createTaskAttributeValue(int $taskId, array $body = []): array
    {
        return $this->send(CreateTaskAttributeValue::build(
            taskId: $taskId,
            body: $body,
        ));
    }

    public function updateTaskAttributeValue(int $attributeId, int $valueId, array $body = []): array
    {
        return $this->send(UpdateTaskAttributeValue::build(
            attributeId: $attributeId,
            valueId: $valueId,
            body: $body,
        ));
    }

    public function deleteAttributeValue(int $attributeId, int $valueId): array
    {
        return $this->send(DeleteAttributeValue::build(
            attributeId: $attributeId,
            valueId: $valueId,
        ));
    }
}