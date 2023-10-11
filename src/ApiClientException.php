<?php

namespace Sendpulse\RestApi;

use Exception;
use Throwable;

class ApiClientException extends Exception
{
    /**
     * @var array
     */
    private $response;

    /**
     * @var string|null
     */
    private $headers;

    /**
     * @var string|null
     */
    private $curlErrors;


    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     * @param array $responseBody
     * @param string|null $headers
     * @param string|null $curlErrors
     */
    public function __construct(
        string    $message = "",
        int       $code = 0,
        Throwable $previous = null,
        array     $responseBody = [],
        string    $headers = null,
        string    $curlErrors = null
    )
    {
        $this->response = $responseBody;
        $this->headers = $headers;
        $this->curlErrors = $curlErrors;

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * @return string|null
     */
    public function getHeaders(): ?string
    {
        return $this->headers;
    }

    /**
     * @return string|null
     */
    public function getCurlErrors(): ?string
    {
        return $this->curlErrors;
    }

}
