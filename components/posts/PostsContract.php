<?php

namespace components\posts;

use components\posts\dto\Post;

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
