<?php

namespace app\infrastructure\services;

use app\components\posts\PostsContract;
use app\components\posts\services\Posts;
use app\infrastructure\services\http\AppResponse;

/**
 * Class PostService
 */
class PostService extends BaseService
{
    /**
     * @param int $id
     * @return AppResponse
     */
    public function get(int $id): AppResponse
    {
        $post = $this->getEntityService()->get($id);

        return new AppResponse($post->toArray());
    }

    /**
     * @param array $params
     * @return AppResponse
     */
    public function list(array $params): AppResponse
    {
        $posts = $this->getEntityService()->list($params);

        return new AppResponse($posts);
    }

    /**
     * @return PostsContract
     */
    protected function getEntityService(): PostsContract
    {
        return new Posts();
    }
}
