<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Http;

use Sendpulse\RestApi\Exception\NetworkException;

final class CurlHttpClient implements HttpClient
{
    public function __construct(
        private readonly int $connectTimeout = 10,
        private readonly int $requestTimeout = 30,
    ) {
    }

    public function send(Request $request): Response
    {
        $ch = curl_init();

        if ($ch === false) {
            throw new NetworkException('Failed to initialise cURL handle');
        }

        $uri = $request->uri;
        if ($uri === '') {
            curl_close($ch);

            throw new \InvalidArgumentException('Request URI must not be empty');
        }

        $curlHeaders = [];
        foreach ($request->headers as $name => $value) {
            $curlHeaders[] = "{$name}: {$value}";
        }

        curl_setopt_array($ch, [
            CURLOPT_URL            => $uri,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => true,
            CURLOPT_CONNECTTIMEOUT => $this->connectTimeout,
            CURLOPT_TIMEOUT        => $this->requestTimeout,
            CURLOPT_HTTPHEADER     => $curlHeaders,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
        ]);

        $method = strtoupper($request->method);
        if ($method === '') {
            curl_close($ch);

            throw new \InvalidArgumentException('Request method must not be empty');
        }

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
        } elseif ($method !== 'GET') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        }

        if ($request->body !== null && $request->body !== '') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request->body);
        }

        $raw = curl_exec($ch);

        if (!is_string($raw)) {
            $error  = curl_error($ch);
            $errno  = curl_errno($ch);
            curl_close($ch);

            throw new NetworkException("cURL error ({$errno}): {$error}");
        }

        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $statusCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $headers = self::parseHeaders(substr($raw, 0, $headerSize));
        $body    = substr($raw, $headerSize);

        return new Response($statusCode, $headers, $body);
    }

    /**
     * @return array<string, string>
     */
    private static function parseHeaders(string $raw): array
    {
        $headers = [];

        foreach (explode("\r\n", $raw) as $line) {
            $pos = strpos($line, ':');
            if ($pos === false) {
                continue;
            }
            $name            = strtolower(trim(substr($line, 0, $pos)));
            $headers[$name]  = trim(substr($line, $pos + 1));
        }

        return $headers;
    }
}
