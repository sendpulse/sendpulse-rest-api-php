<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetEmailsFromMailingList
{
    public static function build(
        int $id,
        ?int $limit = null,
        ?int $offset = null,
        ?string $order = null,
        ?bool $active = null,
        ?bool $not_active = null,
    ): Request
    {
        $uri = str_replace('{id}', (string) $id, '/addressbooks/{id}/emails');
        $query = array_filter([
            'limit' => $limit,
            'offset' => $offset,
            'order' => $order,
            'active' => $active,
            'not_active' => $not_active,
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