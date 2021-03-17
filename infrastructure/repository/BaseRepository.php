<?php

namespace infrastructure\repository;

use infrastructure\services\http\ApiRequest;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class BaseRepository
 */
abstract class BaseRepository
{
    public function createRequest(string $url): RequestInterface
    {
        return new ApiRequest($url);
    }

    public function getData(ResponseInterface $response): array
    {
        return json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
    }
}
