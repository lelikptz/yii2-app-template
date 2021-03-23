<?php

namespace infrastructure\storages;

use infrastructure\services\http\ApiRequest;
use InvalidArgumentException;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/**
 * Class ApiStorage
 */
class ApiStorage implements ApiStorageInterface
{
    private ClientInterface $client;

    /**
     * ApiStorage constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $url
     * @param array $params
     * @return array
     * @throws Throwable
     */
    public function get(string $url, array $params = []): array
    {
        $request = $this->createRequest($url);
        $response = $this->client->sendRequest($request);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return $this->getData($response);
        }

        throw new InvalidArgumentException('Entity not found');
    }

    /**
     * @param string $url
     * @param array $params
     * @return array
     * @throws Throwable
     */
    public function all(string $url, array $params = []): array
    {
        $request = $this->createRequest($url);
        $response = $this->client->sendRequest($request);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return $this->getData($response);
        }

        return [];
    }

    public function createRequest(string $url): RequestInterface
    {
        return new ApiRequest($url);
    }

    /**
     * @param ResponseInterface $response
     * @return array
     * @throws Throwable
     */
    public function getData(ResponseInterface $response): array
    {
        return json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }
}
