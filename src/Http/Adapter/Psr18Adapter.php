<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Http\Adapter;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Sendpulse\RestApi\Exception\NetworkException;
use Sendpulse\RestApi\Http\HttpClient;
use Sendpulse\RestApi\Http\Request;
use Sendpulse\RestApi\Http\Response;

final class Psr18Adapter implements HttpClient
{
    public function __construct(
        private readonly ClientInterface $client,
        private readonly RequestFactoryInterface $requestFactory,
        private readonly StreamFactoryInterface $streamFactory,
    ) {
    }

    public function send(Request $request): Response
    {
        $psrRequest = $this->requestFactory->createRequest($request->method, $request->uri);

        foreach ($request->headers as $name => $value) {
            $psrRequest = $psrRequest->withHeader($name, $value);
        }

        if ($request->body !== null) {
            $psrRequest = $psrRequest->withBody(
                $this->streamFactory->createStream($request->body),
            );
        }

        try {
            $psrResponse = $this->client->sendRequest($psrRequest);
        } catch (\Psr\Http\Client\ClientExceptionInterface $e) {
            throw new NetworkException($e->getMessage(), $e);
        }

        $headers = [];
        foreach ($psrResponse->getHeaders() as $name => $values) {
            $headers[strtolower($name)] = implode(', ', $values);
        }

        return new Response(
            statusCode: $psrResponse->getStatusCode(),
            headers:    $headers,
            body:       (string) $psrResponse->getBody(),
        );
    }
}
