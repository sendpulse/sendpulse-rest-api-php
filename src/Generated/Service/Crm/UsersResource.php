<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetUsers;
use Sendpulse\RestApi\Service\AbstractService;

final class UsersResource extends AbstractService
{
    public function getUsers(): array
    {
        return $this->send(GetUsers::build());
    }
}