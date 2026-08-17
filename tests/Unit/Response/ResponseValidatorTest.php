<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Tests\Unit\Response;

use PHPUnit\Framework\TestCase;
use Sendpulse\RestApi\Exception\ApiException;
use Sendpulse\RestApi\Exception\AuthException;
use Sendpulse\RestApi\Exception\ForbiddenException;
use Sendpulse\RestApi\Exception\ProtocolException;
use Sendpulse\RestApi\Exception\RateLimitException;
use Sendpulse\RestApi\Http\Response;
use Sendpulse\RestApi\Response\ResponseValidator;

final class ResponseValidatorTest extends TestCase
{
    private ResponseValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new ResponseValidator();
    }

    public function testReturnsDecodedArrayOn200(): void
    {
        $response = new Response(200, [], '{"id":1,"name":"test"}');

        self::assertSame(['id' => 1, 'name' => 'test'], $this->validator->validate($response));
    }

    public function testReturnsEmptyArrayOnEmptyBody(): void
    {
        $response = new Response(200, [], '');

        self::assertSame([], $this->validator->validate($response));
    }

    public function testThrowsProtocolExceptionOnNonArrayJson(): void
    {
        $this->expectException(ProtocolException::class);

        $this->validator->validate(new Response(200, [], '"just-a-string"'));
    }

    public function test401ThrowsAuthException(): void
    {
        $this->expectException(AuthException::class);

        $this->validator->validate(new Response(401, [], '{"error":"Unauthorized"}'));
    }

    public function test403ThrowsForbiddenException(): void
    {
        $this->expectException(ForbiddenException::class);

        $this->validator->validate(new Response(403, [], '{"error":"Forbidden"}'));
    }

    public function test429ThrowsRateLimitException(): void
    {
        $this->expectException(RateLimitException::class);

        $this->validator->validate(new Response(429, [], '{"error":"Too Many Requests"}'));
    }

    public function test400ThrowsApiException(): void
    {
        $this->expectException(ApiException::class);

        $this->validator->validate(new Response(400, [], '{"error":"Bad Request"}'));
    }

    public function test500ThrowsApiException(): void
    {
        $this->expectException(ApiException::class);

        $this->validator->validate(new Response(500, [], '{"error":"Server Error"}'));
    }

    public function testInvalidJsonThrowsProtocolException(): void
    {
        $this->expectException(ProtocolException::class);

        $this->validator->validate(new Response(200, [], 'not-json{'));
    }

    public function testHttpStatusIsPreservedOnApiException(): void
    {
        try {
            $this->validator->validate(new Response(422, [], '{"error":"Unprocessable"}'));
            self::fail('Expected ApiException');
        } catch (ApiException $e) {
            self::assertSame(422, $e->httpStatus);
            self::assertSame('{"error":"Unprocessable"}', $e->rawBody);
        }
    }
}
