<?php

/*
 * SendPulse REST API Interface
 *
 * Documentation
 * https://sendpulse.com/api
 *
 */

namespace Sendpulse\RestApi\Contracts;

interface ApiInterface
{

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';
    const TOKEN_TYPE_BEARER = 'Bearer';

    /**
     * Send GET request
     * @param string $path
     * @param array $data
     * @param bool $useToken
     * @return array|null
     */
    public function get(string $path, array $data = [], bool $useToken = true): ?array;

    /**
     * Send POST request
     * @param string $path
     * @param array $data
     * @param bool $useToken
     * @return array|null
     */
    public function post(string $path, array $data = [], bool $useToken = true): ?array;

    /**
     * Send PUT request
     * @param string $path
     * @param array $data
     * @param bool $useToken
     * @return array|null
     */
    public function put(string $path, array $data = [], bool $useToken = true): ?array;

    /**
     * Send PATCH request
     * @param string $path
     * @param array $data
     * @param bool $useToken
     * @return array|null
     */
    public function patch(string $path, array $data = [], bool $useToken = true): ?array;

    /**
     * Send DELETE request
     * @param string $path
     * @param array $data
     * @param bool $useToken
     * @return array|null
     */
    public function delete(string $path, array $data = [], bool $useToken = true): ?array;

}
