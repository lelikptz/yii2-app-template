<?php

namespace infrastructure\services\http;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use yii\httpclient\Client;

/**
 * Class HttpClient
 */
class HttpClient extends Client implements ClientInterface
{
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $response = $this->get($request->getUri())->send();

        return new ApiResponseAdapter($response);
    }
}
