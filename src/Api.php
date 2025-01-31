<?php

namespace Awork;

use Awork\Exceptions\AuthenticationException;
use Awork\Exceptions\NotFoundException;
use Awork\Exceptions\TimeoutException;
use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Factory as HttpClient;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Psr\Log\LoggerInterface;

class Api
{
    public HttpClient $httpClient;
    public Response $latestResponse;

    public const BASE_URL = 'https://api.awork.com/api';
    public const VERSION = 'v1';

    protected ?string $filter = null;
    protected ?string $order = null;
    protected ?int $page = null;
    protected ?int $pageSize = null;

    public function __construct(private string $apiToken, private ?LoggerInterface $logger = null)
    {
        $this->httpClient = new HttpClient();
    }

    /**
     * @throws AuthenticationException
     * @throws NotFoundException
     * @throws TimeoutException
     */
    public function get(string $endpoint): Response
    {
        return $this->makeRequest('get', $endpoint, $this->getQueryParamaters());
    }

    /**
     * @throws AuthenticationException
     * @throws NotFoundException
     * @throws TimeoutException
     */
    public function post(string $endpoint, array $data = []): Response
    {
        return $this->makeRequest('post', $endpoint, $data);
    }

    /**
     * @throws AuthenticationException
     * @throws NotFoundException
     * @throws TimeoutException
     */
    public function put(string $endpoint, array $data = []): Response
    {
        return $this->makeRequest('put', $endpoint, $data);
    }

    /**
     * @throws AuthenticationException
     * @throws NotFoundException
     * @throws TimeoutException
     */
    protected function makeRequest(string $method, string $endpoint, array $data = []): Response
    {
        try {
            $this->latestResponse = $this->request()->{$method}($endpoint, $data);
        } catch (ConnectionException $e) {
            throw new TimeoutException('Connection timed out.', 0, $e);
        }

        return $this->response();
    }

    protected function request(): PendingRequest
    {
        return $this->httpClient
            ->baseUrl(self::BASE_URL . '/' . self::VERSION)
            ->withToken($this->apiToken);
    }

    /**
     * @throws AuthenticationException
     * @throws NotFoundException
     * @throws Exception
     */
    protected function response(): Response
    {
        $this->logger?->debug(sprintf('Request to %s', $this->latestResponse->effectiveUri()), [
            'response' => $this->latestResponse->json(),
            'headers' => $this->latestResponse->headers(),
        ]);

        if ($this->latestResponse->status() === 401) {
            throw new AuthenticationException($this->latestResponse->json('message.description'));
        }

        if ($this->latestResponse->status() === 404) {
            throw new NotFoundException(sprintf('The requested ressource %s could not be found.', $this->latestResponse->effectiveUri()));
        }

        if (! $this->latestResponse->successful()) {
            $this->logger?->error('Request failed', [
                'response' => $this->latestResponse->json(),
                'headers' => $this->latestResponse->headers(),
            ]);
            throw new Exception($this->latestResponse->json('description'));
        }

        return $this->latestResponse;
    }

    public function setFilter(string $filter): self
    {
        $this->filter = $filter;

        return $this;
    }

    public function setOrder(string $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function setPage(int $page): self
    {
        $this->page = $page;

        return $this;
    }

    public function setPageSize(int $page): self
    {
        $this->pageSize = $page;

        return $this;
    }

    protected function getQueryParamaters(): array
    {
        $queryParameters = [];

        if (! is_null($this->filter)) {
            $queryParameters['filterby'] = $this->filter;
        }

        if (! is_null($this->order)) {
            $queryParameters['orderby'] = $this->order;
        }

        if (! is_null($this->page)) {
            $queryParameters['page'] = $this->page;
        }

        if (! is_null($this->pageSize)) {
            $queryParameters['pageSize'] = $this->pageSize;
        }

        return $queryParameters;
    }
}
