<?php

namespace Awork;

use Awork\Exceptions\AuthenticationException;
use Exception;
use Illuminate\Http\Client\Factory as HttpClient;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

class Api
{
    public HttpClient $httpClient;
    public Response $latestResponse;

    public const BASE_URL = 'https://api.awork.io/api';
    public const VERSION = 'v1';

    public function __construct(private string $apiToken)
    {
        $this->httpClient = new HttpClient();
    }

    /**
     * @throws AuthenticationException
     */
    public function get(string $endpoint): Response
    {
        $this->latestResponse = $this->request()->get($endpoint);

        return $this->response();
    }

    public function post(string $endpoint, array $data = []): Response
    {
        $this->latestResponse = $this->request()->post($endpoint, $data);

        return $this->response();
    }

    public function put(string $endpoint, array $data = []): Response
    {
        $this->latestResponse = $this->request()->put($endpoint, $data);

        return $this->response();
    }

    protected function request(): PendingRequest
    {
        return $this->httpClient->baseUrl(self::BASE_URL . '/' . self::VERSION)
            ->withToken($this->apiToken);
    }

    /**
     * @throws AuthenticationException
     * @throws Exception
     */
    protected function response(): Response
    {
        if ($this->latestResponse->status() === 401) {
            throw new AuthenticationException($this->latestResponse->json('message.description'));
        }

        if (!$this->latestResponse->successful()) {
            throw new Exception($this->latestResponse->json('message.description'));
        }

        return $this->latestResponse;
    }
}