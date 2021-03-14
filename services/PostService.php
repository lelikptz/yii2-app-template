<?php

namespace app\services;

use app\components\posts\PostsInterface;
use Yii;
use yii\base\InvalidConfigException;

/**
 * Class PostService
 */
class PostService extends BaseService
{
    /**
     * @param int $id
     * @return ResponseModel
     * @throws InvalidConfigException
     */
    public function get(int $id): ResponseModel
    {
        $post = $this->getEntityService()->get($id);

        return new ResponseModel($post->toArray());
    }

    /**
     * @param array $params
     * @return ResponseModel
     * @throws InvalidConfigException
     */
    public function list(array $params): ResponseModel
    {
        $posts = $this->getEntityService()->list($params);

        return new ResponseModel($posts);
    }

    /**
     * @return PostsInterface
     * @throws InvalidConfigException
     */
    protected function getEntityService(): PostsInterface
    {
        return Yii::createObject('\app\components\posts\services\Posts');
    }
}
