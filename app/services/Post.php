<?php

namespace app\services;

use components\posts\PostsContract;
use infrastructure\services\BaseService;
use infrastructure\services\http\AppResponse;

/**
 * Class Post
 */
class Post extends BaseService
{
    /**
     * @param int $id
     * @return AppResponse
     */
    public function get(int $id): AppResponse
    {
        $post = $this->getPostService()->get($id);

        return new AppResponse($post->toArray());
    }

    /**
     * @param array $params
     * @return AppResponse
     */
    public function list(array $params): AppResponse
    {
        $posts = $this->getPostService()->list($params);

        return new AppResponse($posts);
    }

    /**
     * @return PostsContract
     */
    protected function getPostService(): PostsContract
    {
        return $this->container()->get('\components\posts\services\Posts');
    }
}
