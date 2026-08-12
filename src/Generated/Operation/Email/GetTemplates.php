<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetTemplates
{
    public static function build(
        ?string $owner = null,
        ?bool $only_active = null,
        ?int $limit = null,
        ?int $offset = null,
    ): Request
    {
        $uri = '/templates';
        $query = array_filter([
            'owner' => $owner,
            'only_active' => $only_active,
            'limit' => $limit,
            'offset' => $offset,
        ], fn($v) => $v !== null);

        if ($query) {
            $uri .= '?' . http_build_query($query);
        }

        return new Request(
            method:  'GET',
            uri:     $uri,
        );
    }
}