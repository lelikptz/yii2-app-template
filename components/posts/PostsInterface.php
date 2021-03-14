<?php

namespace app\components\posts;

use app\components\posts\dto\Post;

/**
 * Interface PostsInterface
 */
interface PostsInterface
{
    public function get(int $id): Post;

    /**
     * @param array $params
     * @return Post[]
     */
    public function list(array $params): array;
}
