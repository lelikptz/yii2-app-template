<?php

use components\posts\repositories\PostRepository;
use infrastructure\storages\ApiStorage;

return [
    PostRepository::class => DI\create()->constructor(DI\get(ApiStorage::class)),
];
