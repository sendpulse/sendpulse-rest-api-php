# Thin client architecture & decisions

_Status as of 2026-10-26._

Record of what we built, why, and what's left — so the next session (human or AI)
can pick up without re-deriving it.

## Goal

Turn the SDK into a **thin client** (no factories, no generated typed-model layer)
that is still **user-friendly** (IDE autocomplete) and **AI-friendly** (machine
-readable, loadable by coding agents).

## Core decisions

1. **Drop the generated typed layer.** The old `src/Generated/` (496 files: 5
   services + 64 resources + 288 operation classes + models) was deleted. It was
   already excluded from PHPStan/cs — unanalyzed dead weight.

2. **Thin transport stays.** `Client`, `Config`, `Http/*`, `Auth/*`, `Token/*`,
   `Response/ResponseValidator`, `Exception/*`. The `HttpClient` interface is the
   **seam** — a custom PSR-18 client can replace the bundled curl transport.

3. **Client surface = `get/post/put/patch/delete`** over `request()`/`send()`.
   Array bodies are JSON-encoded; `get()` array params become the query string.

4. **Simplify, but keep `Config`.** Merged `prepare()`+`withAuth()` into one
   `build()`; 401-retry rebuilds from the original request (base URL added once).
   `baseUrl` was fake-configurable (always the default) → made it the constant
   `Client::BASE_URL`; removed the dead field from `Config`.

5. **Operation map, not code, for discoverability.** A flat data map keyed by a
   dotted call-chain is the single source of truth. Rejected alternatives: raw
   OpenAPI snapshot docs and "teaching exceptions" — both require guessing a
   format we don't own (kludges that silently rot).

6. **Chained surface + flat map** (chosen over string-key `call()` and over a
   deep nested-body schema):
   - `$client->crm->deals->getDeal(['dealId' => 5])`
   - validation is **shallow** (required top-level + path params only); body shape
     is judged by the API, not us.

## How it works

### Runtime (SDK)

- `resources/operations/<service>.php` — generated map fragments (one per service).
- `resources/operations.php` — loader that `glob`s + merges the fragments.
- `Client::__get()` returns a `Resource` proxy; `Resource::__get()` extends the
  dotted key; `Resource::__call()` dispatches via `Client::callOperation()`.
- `callOperation()` looks up the key, validates required params, substitutes
  `{path}` params, routes declared params (path vs query), and passes any
  **undeclared** param through (query for GET, JSON body otherwise). Then calls
  the matching `get/post/...`.

### Call convention

One associative array. Path params (`{name}`) + declared query params are routed
automatically; everything else → body (GET → query). `"!"` = required.

### IDE autocomplete

- `resources/ide/stubs.php` — generated phantom classes mirroring the chain
  (service classes with `@property-read` + `__get`; resource classes with real
  method signatures + `array{...}` shapes for param keys).
- `Client` has `@property-read \Sendpulse\RestApi\Stub\* $service` lines.
- Not autoloaded (zero runtime cost). PhpStorm/VS Code index them automatically;
  PHPStan via `scanFiles` (not `stubFiles` — we define new symbols, not override).
- Verified: `$client->crm->deals->getDeal(['dealId'=>5])` resolves to
  `array<mixed>`; bad method/resource are reported as errors.

### AI

- `llms.txt` (repo root) — generated: static PHP-usage header + full endpoint
  catalog from the map. An agent loads one file and knows auth, conventions,
  error classes, and every path + required param.

## Generator (`/Users/bilovol/Projects/sdk-generator`)

- `generators/php/generate.php` — rewritten from ~690 → ~200 lines. Was: models +
  type/response resolvers + Operation/Resource/Service classes. Now: parse spec →
  extract path/params/naming → emit flat map fragment. Old class-generation mode
  removed entirely.
- Chain key = `service.resource.method` = `alias` + `lcfirst(tag)` +
  `lcfirst(operationId)`. Method names kept verbatim from `operationId`.
- **Base path fix:** the path prefix (`/crm/v1`, `/chatbots`) lives in
  `servers[0].url`; the generator now prepends its path component (host is added
  by `Client`).
- `generators/php/generate-stubs.php` — map → `resources/ide/stubs.php`.
- `generators/php/generate-llms.php` — map → `llms.txt`.
- **Three passes chained** in `generators/php/generate.sh`: any single run (or
  `generate-all`) refreshes map + stubs + llms.txt together, so they can't drift.
- `sdks.json`: php `output_path` → `resources/operations`.

## Current state

- **287 operations** generated: crm 189, email 60, sms 18, smtp 17, chatbot 3.
- PHPStan `max` **green**; **30 tests** pass; `Client`/`Config` cs-clean.
- Docs/README/quickstart all on the chain (raw `get/post` shown as fallback).
- Local overhead benchmarked (opcache off): map load ~1 ms once/process, dispatch
  ~35 µs/call — negligible vs the HTTP round-trip. Speed is network-bound.

## Known caveats

- One CRM key collision (`crm.eCommerceProduct.updateProductSections`): two
  operations share tag+operationId; last wins (logged as WARN). Needs a
  disambiguation rule in the generator if it matters.
- `resources/` is outside PHPStan/cs scope (generated data).
- Tag names leak into segments (`checklistItems`, verbose `sendSmtpEmail`).
  Deterministic; a tag-rename map in the generator is the escape hatch if wanted.

## Porting to other SDKs (Java, TypeScript, Python, C#)

"Thin" has two meanings: (1) few files, (2) no bespoke per-endpoint logic / no
typed DTO models / data-driven generic core. **#2 is the real value and ports
everywhere.** #1 is a dynamic-language bonus.

- **Universal (1:1):** the operation map (single source of truth), the thin
  transport, and `llms.txt`. Recommended: emit a neutral `operations.json`
  intermediate once from the spec; each language generator consumes it → identical
  chains/paths/params across all SDKs.
- **TypeScript** — strongest. Runtime `Proxy` + generated `.d.ts`; param object
  literals give compiler-native autocomplete + compile-time checks.
- **Python** — direct analog of PHP. `__getattr__` chain + generated `.pyi`
  stubs; native kwargs let stubs declare `getDeal(*, dealId: int)` — param
  autocomplete even better than PHP's array-shape.
- **Java / C#** — no runtime metaprogramming + no stub-file layer, so the
  magic-chain gives no autocomplete. The thin **core** is identical (transport +
  bundled `operations.json` + generic `call(key, params)` + generic responses,
  no models). For idiomatic autocomplete you additionally generate **thin facade
  classes** (one line each, delegating to `call()`) — zero logic, no DTO models,
  same single source. So you keep thinness-#2; you lose "few files" (~70 generated
  facades). Pure string-key `call()` stays available for endpoints outside the map.

**Takeaway:** the philosophy (thin + map + generated surface) is universal. "Few
files" holds in PHP/Python/TS; Java/C# surfaces are necessarily thicker — a
language limit, not an architecture failure.

## Open / next steps

- Chain the three passes at `scripts/generate.sh` / Makefile (all-services level).
- Neutral `operations.json` intermediate for cross-SDK sharing.
- Generator disambiguation for colliding keys.
- Optional: tag-rename map for cleaner segment names.
- Commit / PR (not done yet).
