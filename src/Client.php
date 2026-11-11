<?php

declare(strict_types=1);

namespace Sendpulse\RestApi;

use Sendpulse\RestApi\Auth\ApiKeyAuth;
use Sendpulse\RestApi\Auth\Authentication;
use Sendpulse\RestApi\Auth\OAuthAuth;
use Sendpulse\RestApi\Auth\TokenManager;
use Sendpulse\RestApi\Http\CurlHttpClient;
use Sendpulse\RestApi\Http\HttpClient;
use Sendpulse\RestApi\Http\Request;
use Sendpulse\RestApi\Response\ResponseValidator;
use Sendpulse\RestApi\Token\FileTokenStorage;

/**
 * @property-read \Sendpulse\RestApi\Stub\Email   $email
 * @property-read \Sendpulse\RestApi\Stub\Sms     $sms
 * @property-read \Sendpulse\RestApi\Stub\Smtp    $smtp
 * @property-read \Sendpulse\RestApi\Stub\Crm     $crm
 * @property-read \Sendpulse\RestApi\Stub\Chatbot $chatbot
 */
final class Client
{
    private const BASE_URL = 'https://api.sendpulse.com';

    /** @var array<string, array{method: string, path: string, params?: array<string, string>}>|null */
    private static ?array $operationsCache = null;

    private readonly Config $config;
    private readonly HttpClient $http;
    private readonly Authentication $auth;
    private readonly ResponseValidator $validator;

    public function __construct(
        ?string $apiKey = null,
        ?string $clientId = null,
        ?string $clientSecret = null,
        ?int $connectTimeout = null,
        ?int $requestTimeout = null,
        ?string $cacheDir = null,
        ?\Sendpulse\RestApi\Token\TokenStorage $tokenStorage = null,
        ?HttpClient $httpClient = null,
    ) {
        $this->config = new Config(
            apiKey:         $apiKey,
            clientId:       $clientId,
            clientSecret:   $clientSecret,
            connectTimeout: $connectTimeout,
            requestTimeout: $requestTimeout,
            cacheDir:       $cacheDir,
            tokenStorage:   $tokenStorage,
            httpClient:     $httpClient,
        );

        $this->http      = $this->config->httpClient ?? new CurlHttpClient(
            $this->config->connectTimeout,
            $this->config->requestTimeout,
        );
        $this->auth      = $this->buildAuth();
        $this->validator = new ResponseValidator();
    }

    /**
     * Entry point for the chained operation surface: $client->crm->deals->get([...]).
     */
    public function __get(string $name): Resource
    {
        return new Resource($this, $name);
    }

    /**
     * Dispatch a mapped operation by its dotted key.
     *
     * @param array<string, mixed> $params
     * @return array<mixed>
     */
    public function callOperation(string $key, array $params = []): array
    {
        $operations = self::operations();

        if (!isset($operations[$key])) {
            throw new \InvalidArgumentException("Unknown operation: {$key}");
        }

        $op     = $operations[$key];
        $path   = $op['path'];
        $method = $op['method'];
        $query  = [];
        $body   = [];

        foreach ($op['params'] ?? [] as $name => $type) {
            $inPath   = str_contains($path, '{' . $name . '}');
            $required = $inPath || str_ends_with($type, '!');

            if (!array_key_exists($name, $params)) {
                if ($required) {
                    throw new \InvalidArgumentException("Missing required parameter '{$name}' for {$key}");
                }

                continue;
            }

            $value = $params[$name];

            if ($inPath) {
                if (!is_scalar($value)) {
                    throw new \InvalidArgumentException("Path parameter '{$name}' for {$key} must be scalar");
                }

                $path = str_replace('{' . $name . '}', rawurlencode((string) $value), $path);
            } elseif ($method === 'GET') {
                $query[$name] = $value;
            } else {
                $body[$name] = $value;
            }
        }

        // Pass undeclared params through untouched (query for GET, body otherwise).
        foreach ($params as $name => $value) {
            if (isset($op['params'][$name])) {
                continue;
            }

            if ($method === 'GET') {
                $query[$name] = $value;
            } else {
                $body[$name] = $value;
            }
        }

        return match ($method) {
            'GET'    => $this->get($path, $query),
            'POST'   => $this->post($path, $body),
            'PUT'    => $this->put($path, $body),
            'PATCH'  => $this->patch($path, $body),
            'DELETE' => $this->delete($path, $body),
            default  => throw new \InvalidArgumentException("Unsupported method '{$method}' for {$key}"),
        };
    }

    /**
     * GET request. Array params are appended to the URI as a query string.
     *
     * @param array<string, mixed> $query
     * @param array<string, string> $headers
     * @return array<mixed>
     */
    public function get(string $path, array $query = [], array $headers = []): array
    {
        if ($query !== []) {
            $path .= (str_contains($path, '?') ? '&' : '?') . http_build_query($query);
        }

        return $this->request('GET', $path, null, $headers);
    }

    /**
     * @param array<mixed> $body
     * @param array<string, string> $headers
     * @return array<mixed>
     * @throws \JsonException
     */
    public function post(string $path, array $body = [], array $headers = []): array
    {
        return $this->request('POST', $path, $this->encodeBody($body), $headers);
    }

    /**
     * @param array<mixed> $body
     * @param array<string, string> $headers
     * @return array<mixed>
     * @throws \JsonException
     */
    public function put(string $path, array $body = [], array $headers = []): array
    {
        return $this->request('PUT', $path, $this->encodeBody($body), $headers);
    }

    /**
     * @param array<mixed> $body
     * @param array<string, string> $headers
     * @return array<mixed>
     * @throws \JsonException
     */
    public function patch(string $path, array $body = [], array $headers = []): array
    {
        return $this->request('PATCH', $path, $this->encodeBody($body), $headers);
    }

    /**
     * @param array<mixed> $body
     * @param array<string, string> $headers
     * @return array<mixed>
     * @throws \JsonException
     */
    public function delete(string $path, array $body = [], array $headers = []): array
    {
        return $this->request('DELETE', $path, $this->encodeBody($body), $headers);
    }

    /**
     * @param array<mixed> $body
     * @throws \JsonException
     */
    private function encodeBody(array $body): ?string
    {
        return $body !== [] ? json_encode($body, JSON_THROW_ON_ERROR) : null;
    }

    /**
     * @return array<mixed>
     */
    public function send(Request $request): array
    {
        $response = $this->http->send($this->build($request));

        if ($response->statusCode === 401 && $this->auth->supportsRefresh()) {
            $this->auth->invalidate();
            $response = $this->http->send($this->build($request));
        }

        return $this->validator->validate($response);
    }

    /**
     * @param array<string, string> $headers
     * @return array<mixed>
     */
    public function request(string $method, string $path, ?string $body = null, array $headers = []): array
    {
        return $this->send(new Request(
            method:  strtoupper($method),
            uri:     $path,
            headers: $headers,
            body:    $body,
        ));
    }

    /**
     * @return array<string, array{method: string, path: string, params?: array<string, string>}>
     */
    private static function operations(): array
    {
        if (self::$operationsCache === null) {
            /** @var array<string, array{method: string, path: string, params?: array<string, string>}> $map */
            $map = require __DIR__ . '/../resources/operations.php';
            self::$operationsCache = $map;
        }

        return self::$operationsCache;
    }

    private function build(Request $request): Request
    {
        return new Request(
            method:  $request->method,
            uri:     self::BASE_URL . '/' . ltrim($request->uri, '/'),
            headers: array_merge(
                [
                    'Content-Type' => 'application/json',
                    'Accept'       => 'application/json',
                ],
                $request->headers,
                ['Authorization' => $this->auth->getAuthorizationHeader()],
            ),
            body:    $request->body,
        );
    }

    private function buildAuth(): Authentication
    {
        if (!$this->config->isOAuth()) {
            return new ApiKeyAuth($this->config->apiKey ?? '');
        }

        $storage = $this->config->tokenStorage
            ?? new FileTokenStorage($this->config->cacheDir);

        $manager = new TokenManager(
            httpClient:    $this->http,
            clientId:      $this->config->clientId ?? '',
            clientSecret:  $this->config->clientSecret ?? '',
            baseUrl:       self::BASE_URL,
            storage:       $storage,
        );

        return new OAuthAuth($manager);
    }
}
