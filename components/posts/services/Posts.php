<?php

namespace components\posts\services;

use components\posts\dto\Post;
use components\posts\PostsContract;
use components\posts\repositories\PostRepository;
use infrastructure\services\BaseService;
use Throwable;

/**
 * Class Posts
 */
class Posts extends BaseService implements PostsContract
{
    /**
     * @param int $id
     * @return Post
     * @throws Throwable
     */
    public function get(int $id): Post
    {
        return $this->getRepository()->get($id);
    }

    /**
     * @param array $params
     * @return Post[]
     * @throws Throwable
     */
    public function list(array $params): array
    {
        return $this->getRepository()->list();
    }

    /**
     * @return PostRepository
     */
    private function getRepository(): PostRepository
    {
        return $this->container()->get(PostRepository::class);
    }
}
