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
use Sendpulse\RestApi\Generated\Service\ChatbotService;
use Sendpulse\RestApi\Generated\Service\CrmService;
use Sendpulse\RestApi\Generated\Service\EmailService;
use Sendpulse\RestApi\Generated\Service\SmsService;
use Sendpulse\RestApi\Generated\Service\SmtpService;
use Sendpulse\RestApi\Token\FileTokenStorage;

final class Client
{
    private readonly Config $config;
    private readonly HttpClient $http;
    private readonly Authentication $auth;
    private readonly ResponseValidator $validator;

    private ?EmailService   $email   = null;
    private ?SmtpService    $smtp    = null;
    private ?SmsService     $sms     = null;
    private ?CrmService     $crm     = null;
    private ?ChatbotService $chatbot = null;

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

    public function emailService(): EmailService
    {
        return $this->email ??= new EmailService($this);
    }

    public function smtpService(): SmtpService
    {
        return $this->smtp ??= new SmtpService($this);
    }

    public function smsService(): SmsService
    {
        return $this->sms ??= new SmsService($this);
    }

    public function crmService(): CrmService
    {
        return $this->crm ??= new CrmService($this);
    }

    public function chatbotService(): ChatbotService
    {
        return $this->chatbot ??= new ChatbotService($this);
    }

    /**
     * @return array<mixed>
     */
    public function send(Request $request): array
    {
        $prepared = $this->prepare($request);
        $authed   = $this->withAuth($prepared);
        $response = $this->http->send($authed);

        if ($response->statusCode === 401 && $this->auth->supportsRefresh()) {
            $this->auth->invalidate();
            $authed   = $this->withAuth($prepared);
            $response = $this->http->send($authed);
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

    private function prepare(Request $request): Request
    {
        return new Request(
            method:  $request->method,
            uri:     $this->config->baseUrl . '/' . ltrim($request->uri, '/'),
            headers: array_merge([
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ], $request->headers),
            body:    $request->body,
        );
    }

    private function withAuth(Request $request): Request
    {
        return new Request(
            method:  $request->method,
            uri:     $request->uri,
            headers: array_merge($request->headers, [
                'Authorization' => $this->auth->getAuthorizationHeader(),
            ]),
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
            baseUrl:       $this->config->baseUrl,
            storage:       $storage,
        );

        return new OAuthAuth($manager);
    }
}
