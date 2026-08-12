<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Chatbot;

use Sendpulse\RestApi\Generated\Operation\Chatbot\GetDialogs;
use Sendpulse\RestApi\Service\AbstractService;

final class DialogsResource extends AbstractService
{
    public function getDialogs(?int $size = null, ?int $skip = null, ?string $search_after = null, ?string $order = null): array
    {
        return $this->send(GetDialogs::build(
            size: $size,
            skip: $skip,
            search_after: $search_after,
            order: $order,
        ));
    }
}