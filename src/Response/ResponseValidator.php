<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Response;

use Sendpulse\RestApi\Exception\ApiException;
use Sendpulse\RestApi\Exception\AuthException;
use Sendpulse\RestApi\Exception\ProtocolException;
use Sendpulse\RestApi\Exception\RateLimitException;
use Sendpulse\RestApi\Http\Response;

final class ResponseValidator
{
    /** @return array<mixed> */
    public function validate(Response $response): array
    {
        $status = $response->statusCode;

        if ($status >= 200 && $status < 300) {
            return $this->decode($response);
        }

        if ($status === 401 || $status === 403) {
            throw new AuthException($status, $response->body);
        }

        if ($status === 429) {
            throw new RateLimitException($status, $response->body);
        }

        throw new ApiException($status, $response->body);
    }

    /** @return array<mixed> */
    private function decode(Response $response): array
    {
        if ($response->body === '') {
            return [];
        }

        try {
            $data = json_decode($response->body, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            throw new ProtocolException(
                message: 'Failed to decode response body: ' . $e->getMessage(),
                previous: $e,
            );
        }

        return is_array($data) ? $data : [];
    }
}
