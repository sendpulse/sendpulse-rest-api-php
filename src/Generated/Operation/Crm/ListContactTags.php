<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Crm;

use Sendpulse\RestApi\Http\Request;

final class ListContactTags
{
    public static function build(
        ?string $name = null,
        ?string $search = null,
    ): Request
    {
        $uri = '/crm/v1/contact-tags';
        $query = array_filter([
            'name' => $name,
            'search' => $search,
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