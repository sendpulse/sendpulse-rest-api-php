# Authentication

The SDK supports two authentication methods: **OAuth 2.0** (recommended) and **API key**.

## OAuth 2.0 (client credentials)

```php
$client = new Client(
    clientId:     'YOUR_CLIENT_ID',
    clientSecret: 'YOUR_CLIENT_SECRET',
);
```

- Tokens are fetched automatically on the first request
- Cached and reused until 5 minutes before expiry
- On a `401` response the SDK invalidates the token, fetches a new one, and retries once
- You never handle tokens manually

Obtain `clientId` and `clientSecret` from your [SendPulse API settings](https://sendpulse.com/settings/api).

## API Key

```php
$client = new Client(apiKey: 'YOUR_API_KEY');
```

- Simpler setup, no token management
- The key is sent as a `Bearer` header on every request
- Does not support automatic refresh — if the key is revoked, requests fail with `AuthException`

Use API key auth for quick scripts or environments where OAuth token caching is not practical.

---

## Token Storage

Token storage only applies to OAuth. The SDK ships with three implementations.

### FileTokenStorage (default)

Tokens are stored as JSON files in the system temp directory (or a custom path). Suitable for single-server setups.

```php
// default — uses sys_get_temp_dir()
$client = new Client(clientId: '...', clientSecret: '...');

// custom directory
$client = new Client(
    clientId:     '...',
    clientSecret: '...',
    cacheDir:     '/var/cache/myapp',
);
```

Files are written atomically (temp file + rename) with exclusive locking and `0600` permissions.

### Psr16TokenStorage

Uses any PSR-16 compatible cache (Redis, Memcached, APCu, etc.). Recommended for multi-server deployments and containerised environments where the filesystem is not shared.

```php
use Sendpulse\RestApi\Token\Psr16TokenStorage;

$client = new Client(
    clientId:     '...',
    clientSecret: '...',
    tokenStorage: new Psr16TokenStorage($yourPsr16Cache),
);
```

The TTL is calculated automatically from the token's `expires_at` field, with a 60-second safety buffer.

Popular PSR-16 implementations:

| Library | Class |
|---|---|
| Symfony Cache | `Symfony\Component\Cache\Psr16Cache` |
| Laravel Cache | `Illuminate\Cache\Repository` (implements PSR-16) |
| phpFastCache | `phpFastCache\Helper\Psr16Adapter` |

### InMemoryTokenStorage

Stores the token in memory for the duration of the process. Suitable for CLI scripts and tests where persistence between requests is not needed.

```php
use Sendpulse\RestApi\Token\InMemoryTokenStorage;

$client = new Client(
    clientId:     '...',
    clientSecret: '...',
    tokenStorage: new InMemoryTokenStorage(),
);
```

---

## Choosing a storage

| Environment | Recommended storage |
|---|---|
| Single server, long-running PHP-FPM | `FileTokenStorage` |
| Multiple servers / containers | `Psr16TokenStorage` with Redis |
| CLI script / one-off job | `InMemoryTokenStorage` |
| Laravel | `Psr16TokenStorage` with Laravel Cache (see [laravel.md](laravel.md)) |
| Tests | `InMemoryTokenStorage` |

---

## Custom TokenStorage

Implement the `TokenStorage` interface to use any backend:

```php
use Sendpulse\RestApi\Token\TokenStorage;

class DatabaseTokenStorage implements TokenStorage
{
    public function get(string $key): ?array
    {
        $row = DB::table('oauth_tokens')->where('key', $key)->first();

        return $row ? json_decode($row->token, true) : null;
    }

    public function set(string $key, array $token): void
    {
        DB::table('oauth_tokens')->updateOrInsert(
            ['key' => $key],
            ['token' => json_encode($token), 'updated_at' => now()],
        );
    }

    public function delete(string $key): void
    {
        DB::table('oauth_tokens')->where('key', $key)->delete();
    }
}

$client = new Client(
    clientId:     '...',
    clientSecret: '...',
    tokenStorage: new DatabaseTokenStorage(),
);
```

The `$token` array passed to `set()` always has this shape:

```php
[
    'access_token' => string,
    'token_type'   => string,  // always "Bearer"
    'expires_at'   => int,     // Unix timestamp
]
```
