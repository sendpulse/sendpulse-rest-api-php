<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Operation\Chatbot;

use Sendpulse\RestApi\Http\Request;

final class GetDialogs
{
    public static function build(
        ?int $size = null,
        ?int $skip = null,
        ?string $search_after = null,
        ?string $order = null,
    ): Request
    {
        $uri = '/chatbots/dialogs';
        $query = array_filter([
            'size' => $size,
            'skip' => $skip,
            'search_after' => $search_after,
            'order' => $order,
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