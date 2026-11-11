# Changelog

All notable changes to this project will be documented in this file.

## [4.0.0] — 2026-11-11

Thin-client rewrite. Typed DTO models and per-service facades are replaced by a
generated **operation map** with a **chained call surface**, backed by a single
lightweight transport.

### Added

- **Chained endpoint surface** — call any mapped endpoint as
  `$client->{service}->{resource}->{operation}([...])`, e.g.
  `$client->email->campaigns->getCampaigns(['limit' => 10])`. One associative
  array per call: path and declared query params are routed automatically, any
  other key goes to the JSON body. Hyphenated services (`file-manager`,
  `live-chat`, `viber-chatbot`, `web-push`) via `$client->{'file-manager'}->...`.
- **19 services** generated from the OpenAPI specs (email, smtp, sms, crm,
  chatbots, a360, edu, facebook, file-manager, instagram, live-chat, popups,
  telegram, tiktok, verifier, viber, viber-chatbot, web-push, whatsapp).
- **IDE stubs** (`resources/ide/stubs.php`) and an AI-facing catalog
  (`llms.txt`), giving autocomplete over every service, resource, operation and
  its parameters.
- **Raw requests** — `get()`/`post()`/`put()`/`patch()`/`delete()` helpers over
  the `request()`/`send()` transport for any endpoint outside the map.

### BC Breaks

- **Service facades removed** — `emailService()`, `smtpService()`, `smsService()`,
  `crmService()`, `chatbotService()` are gone; use the chained surface or raw
  requests.
- **Typed response models removed** — every call returns the decoded JSON as an
  `array<mixed>` instead of DTOs.

### Changed

- `Client` exposes `get()`, `post()`, `put()`, `patch()`, `delete()` over the
  `request()`/`send()` transport. Array bodies are JSON-encoded; `get()` array
  params become the query string.

### Removed

- `src/Generated/*` (typed services, resources, models) and
  `Service\AbstractService`.
- `cebe/php-openapi` dev dependency (OpenAPI generation moved out of the repo).

### Carried over from 3.0.x (now withdrawn)

- `ForbiddenException` for HTTP 403 — distinct from `AuthException`.
- `SendPulseExceptionInterface` marker across all six SDK exceptions.
- Percent-encoded path parameters (`rawurlencode`).
- `ResponseValidator` throws `ProtocolException` on a non-array JSON primitive.

---

## [3.0.1] — 2026-08-17

> **Withdrawn** — released in error and removed from Packagist. Upgrade to 4.0.0;
> the fixes below are carried over there.

### Fixed

- **CRM and chatbot URL prefixes** — all CRM endpoints now correctly target `/crm/v1/*` and chatbot endpoints `/chatbots/*`; previously every call returned 404.
- **Path parameter encoding** — path parameters are now percent-encoded via `rawurlencode()` in all generated operations; values containing `#`, `?`, `/` or `+` no longer corrupt the request URI.
- **`ForbiddenException` added** — HTTP 403 (tariff or permission restriction) is now thrown as `ForbiddenException` instead of `AuthException`; the two can be caught and handled independently.
- **`SendPulseExceptionInterface` added** — `NetworkException` and `ProtocolException` now implement this marker interface alongside the `SendPulseException` hierarchy; a single `catch (SendPulseExceptionInterface $e)` block covers all six SDK exception classes.
- **Non-array JSON response** — `ResponseValidator` now throws `ProtocolException` when the API returns a JSON primitive (`true`, a number, a string) instead of silently returning `[]`.

---

## [3.0.0] — 2026-08-06

> **Withdrawn** — released in error and removed from Packagist. Upgrade to 4.0.0.

Complete rewrite. See [docs/upgrading.md](docs/upgrading.md) for the migration guide.

### BC Breaks

- **Entry point changed** — use `new Sendpulse\RestApi\Client(apiKey: '...')` instead of the old `ApiClient` class.
- **Authentication** — OAuth (`clientId` + `clientSecret`) and API key (`apiKey`) are now named constructor arguments; the old positional `(API_USER_ID, API_SECRET, $storage)` signature is gone.
- **Service layer** — raw `get()`/`post()`/`put()`/`patch()`/`delete()` calls replaced by typed facades (`emailService()`, `smtpService()`, etc.).
- **Exceptions** — `ApiClientException` replaced by a typed hierarchy: `AuthException`, `RateLimitException`, `ApiException`, `NetworkException`, `ProtocolException`.
- **PHP 8.3+** required (was 7.1+).
- **Storage** — `FileStorage`/`SessionStorage`/`MemcachedStorage` removed; use `FileTokenStorage`, `InMemoryTokenStorage`, or bring your own via `TokenStorage` interface.

### Added

- Typed service facades: `emailService()`, `smtpService()`, `smsService()`, `crmService()`, `chatbotService()`.
- Services and models generated from OpenAPI specs — all endpoints covered.
- `TokenStorage` interface with `FileTokenStorage` (atomic, flock-based) and `InMemoryTokenStorage`.
- Optional PSR-16 adapter (`Psr16TokenStorage`) and PSR-18 HTTP adapter (`Http\Adapter\Psr18Adapter`).
- Auto-retry on `401` — cached token is invalidated and a fresh one is fetched before retrying once.
- PHPStan level max compliance.

---

## [2.0.1.2] — 2024-06-03

- Refactored README.

## [2.0.1.1] — 2023-10-25

- Updated README examples.

## [2.0.1] — 2023-10-25

- Added usage examples to README.

## [2.0] — 2023-10-11

- Internal refactoring; public `ApiClient` API unchanged.

## [1.0.27] — 2023-03-24

- Fixed incorrect API route paths.

## [1.0.26] — 2021-09-28

- Added Automation360 methods to documentation.

## [1.0.25] — 2021-09-24

- Added Automation360 client integration.

## [1.0.24] — 2021-07-01

- Added binary attachment support for campaign creation.

## [1.0.23] — 2021-05-18

- Fixed SMTP resend functionality.

## [1.0.22] — 2020-12-15

- Extended `smtpSendEmail` response handling.
