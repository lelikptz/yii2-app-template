<?php

namespace app\infrastructure\services\http;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use yii\httpclient\Response as YiiResponse;

/**
 * Class YiiResponseAdapter
 */
class ApiResponseAdapter implements ResponseInterface
{
    private YiiResponse $response;

    /**
     * YiiResponseAdapter constructor.
     * @param YiiResponse $response
     */
    public function __construct(YiiResponse $response)
    {
        $this->response = $response;
    }

    public function getHeaders()
    {
        return $this->response->getHeaders();
    }

    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    public function getBody(): string
    {
        return $this->response->content;
    }

    public function getProtocolVersion()
    {
    }

    public function withProtocolVersion($version)
    {
    }

    public function hasHeader($name)
    {
    }

    public function getHeader($name)
    {
    }

    public function getHeaderLine($name)
    {
    }

    public function withHeader($name, $value)
    {
    }

    public function withAddedHeader($name, $value)
    {
    }

    public function withoutHeader($name)
    {
    }

    public function withBody(StreamInterface $body)
    {
    }

    public function withStatus($code, $reasonPhrase = '')
    {
    }

    public function getReasonPhrase()
    {
    }
}
