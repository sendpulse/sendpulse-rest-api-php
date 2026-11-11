<?php

declare(strict_types=1);

/**
 * Operation map — the single source of truth for the chained API surface.
 *
 * Merges the generated per-service fragments in operations/ (one file per
 * service, produced by the sdk-generator). Adding or updating an endpoint
 * happens in those fragments, not here.
 *
 *   key    = call chain: 'crm.deals.getDeal'  ->  $client->crm->deals->getDeal([...])
 *   method = HTTP verb
 *   path   = URI; "{name}" segments are filled from the param of the same name
 *   params = path + query params; a trailing "!" marks a required one. Body is
 *            not declared — any undeclared param passes through (query for GET,
 *            body otherwise), so nested bodies work as-is.
 *
 * @return array<string, array{method: string, path: string, params: array<string, string>}>
 */

$map = [];

foreach (glob(__DIR__ . '/operations/*.php') ?: [] as $fragment) {
    /** @var array<string, array{method: string, path: string, params: array<string, string>}> $part */
    $part = require $fragment;
    $map  = array_merge($map, $part);
}

return $map;
