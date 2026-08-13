<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Model\Crm;

final class TasksConnection
{
    public function __construct(
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\TaskAutocomplete $tasks = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\DealsAutocomplete $deals = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\ContactsAutocomplete $contacts = null,
        public readonly ?\Sendpulse\RestApi\Generated\Model\Crm\TaskAutocomplete $subTasks = null,
    )
    {}

    /** @param array<mixed> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            tasks: isset($data['tasks']) && is_array($data['tasks']) ? TaskAutocomplete::fromArray($data['tasks']) : null,
            deals: isset($data['deals']) && is_array($data['deals']) ? DealsAutocomplete::fromArray($data['deals']) : null,
            contacts: isset($data['contacts']) && is_array($data['contacts']) ? ContactsAutocomplete::fromArray($data['contacts']) : null,
            subTasks: isset($data['subTasks']) && is_array($data['subTasks']) ? TaskAutocomplete::fromArray($data['subTasks']) : null,
        );
    }
}