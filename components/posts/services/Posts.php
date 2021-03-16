<?php

namespace app\components\posts\services;

use app\components\posts\dto\Post;
use app\components\posts\PostsContract;
use app\components\posts\repositories\PostRepository;
use app\infrastructure\services\http\HttpClient;
use Throwable;

/**
 * Class Posts
 */
class Posts implements PostsContract
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
        return new PostRepository(new HttpClient());
    }
}
