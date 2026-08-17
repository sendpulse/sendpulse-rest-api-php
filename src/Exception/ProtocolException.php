<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Exception;

final class ProtocolException extends \RuntimeException implements SendPulseExceptionInterface
{
    public function __construct(
        string $message = '',
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, 0, $previous);
    }
}
