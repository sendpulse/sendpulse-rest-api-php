<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Email;

use Sendpulse\RestApi\Generated\Operation\Email\GetBlacklist;
use Sendpulse\RestApi\Generated\Operation\Email\AddToBlacklist;
use Sendpulse\RestApi\Generated\Model\Email\ResultTrue;
use Sendpulse\RestApi\Generated\Operation\Email\RemoveFromBlacklist;
use Sendpulse\RestApi\Service\AbstractService;

final class BlacklistResource extends AbstractService
{
    public function getBlacklist(): array
    {
        return $this->send(GetBlacklist::build());
    }

    public function addToBlacklist(array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(AddToBlacklist::build(
            body: $body,
        )));
    }

    public function removeFromBlacklist(array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(RemoveFromBlacklist::build(
            body: $body,
        )));
    }
}