<?php

use infrastructure\services\http\HttpClient;
use Psr\Http\Client\ClientInterface;

return [
    ClientInterface::class => DI\create(HttpClient::class),
];
