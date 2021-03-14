<?php

namespace app\components\posts\repositories;

use app\components\posts\dto\Post;
use yii\httpclient\Client;
use yii\httpclient\Exception;
use yii\web\NotFoundHttpException;

/**
 * Class PostRepository
 */
class PostRepository
{
    /**
     * @var Client
     */
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $id
     * @return Post
     * @throws Exception|NotFoundHttpException
     */
    public function get(int $id): Post
    {
        $response = $this->client->get("https://jsonplaceholder.typicode.com/todos/$id")->send();
        if ($response->getIsOk()) {
            return new Post($response->data);
        }

        throw new NotFoundHttpException('Post not found');
    }

    /**
     * @return array
     * @throws Exception
     */
    public function list(): array
    {
        $response = $this->client->get('https://jsonplaceholder.typicode.com/todos')->send();
        if ($response->getIsOk()) {
            return Post::arrayOf($response->data);
        }

        return [];
    }
}
