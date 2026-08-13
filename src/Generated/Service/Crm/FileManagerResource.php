<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\UploadFiles;
use Sendpulse\RestApi\Service\AbstractService;

final class FileManagerResource extends AbstractService
{
    public function uploadFiles(array $body = []): array
    {
        return $this->send(UploadFiles::build(
            body: $body,
        ));
    }
}