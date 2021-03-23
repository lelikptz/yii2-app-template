<?php

namespace components\posts\repositories;

use components\posts\dto\Post;
use infrastructure\storages\ApiStorageInterface;
use Throwable;

/**
 * Class PostRepository
 */
class PostRepository
{
    private ApiStorageInterface $storage;
    private string $baseUrl = 'https://jsonplaceholder.typicode.com';

    /**
     * PostRepository constructor.
     * @param ApiStorageInterface $storage
     */
    public function __construct(ApiStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param int $id
     * @return Post
     * @throws Throwable
     */
    public function get(int $id): Post
    {
        $item = $this->storage->get($this->baseUrl . "/todos/$id");

        return new Post($item);
    }

    /**
     * @return array
     * @throws Throwable
     */
    public function list(): array
    {
        $items = $this->storage->all($this->baseUrl . '/todos');

        return Post::arrayOf($items);
    }
}
