<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Exception;

abstract class SendPulseException extends \RuntimeException implements SendPulseExceptionInterface
{
    public function __construct(
        public readonly int $httpStatus,
        public readonly string $rawBody,
        string $message = '',
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message ?: $rawBody, $httpStatus, $previous);
    }
}
