<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetTemplateBySlug
{
    public static function build(
        string $name_slug,
        ?string $owner = null,
        ?string $lang = null,
    ): Request
    {
        $uri = str_replace('{name_slug}', (string) $name_slug, '/template/slug/{name_slug}');
        $query = array_filter([
            'owner' => $owner,
            'lang' => $lang,
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