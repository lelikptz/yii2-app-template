<?php

namespace app\components\posts;

use app\components\posts\dto\Post;

/**
 * Interface PostsContract
 */
interface PostsContract
{
    public function get(int $id): Post;

    /**
     * @param array $params
     * @return Post[]
     */
    public function list(array $params): array;
}
