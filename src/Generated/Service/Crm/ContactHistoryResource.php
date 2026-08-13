<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetContactHistory;
use Sendpulse\RestApi\Generated\Model\Crm\ContactHistory;
use Sendpulse\RestApi\Service\AbstractService;

final class ContactHistoryResource extends AbstractService
{
    /**
     * @return ContactHistory[]
     */
    public function getContactHistory(int $contactId, string $fromDate, string $toDate): array
    {
        return array_map(
            static fn(array $item) => ContactHistory::fromArray($item),
            $this->send(GetContactHistory::build(
            contactId: $contactId,
            fromDate: $fromDate,
            toDate: $toDate,
        ))
        );
    }
}