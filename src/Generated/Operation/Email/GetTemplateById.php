<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Email;

use Sendpulse\RestApi\Http\Request;

final class GetTemplateById
{
    public static function build(
        string $template_id,
        ?string $owner = null,
        ?string $lang = null,
    ): Request
    {
        $uri = str_replace('{template_id}', (string) $template_id, '/template/{template_id}');
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