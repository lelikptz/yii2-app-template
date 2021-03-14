<?php

namespace app\components\posts\services;

use app\components\posts\dto\Post;
use app\components\posts\PostsInterface;
use app\components\posts\repositories\PostRepository;
use Yii;
use yii\base\InvalidConfigException;
use yii\httpclient\Exception;
use yii\web\NotFoundHttpException;

/**
 * Class Posts
 */
class Posts implements PostsInterface
{
    /**
     * @param int $id
     * @return Post
     * @throws InvalidConfigException|Exception|NotFoundHttpException
     */
    public function get(int $id): Post
    {
        return $this->getRepository()->get($id);
    }

    /**
     * @param array $params
     * @return Post[]
     * @throws Exception|InvalidConfigException
     */
    public function list(array $params): array
    {
        return $this->getRepository()->list();
    }

    /**
     * @return PostRepository
     * @throws InvalidConfigException
     */
    private function getRepository(): PostRepository
    {
        return Yii::createObject(PostRepository::class);
    }
}
