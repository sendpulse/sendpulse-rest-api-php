# Changelog

All notable changes to this project will be documented in this file.

## [3.0.0] — 2026-08-06

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
