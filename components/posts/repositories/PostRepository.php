<?php

namespace app\components\posts\repositories;

use app\components\posts\dto\Post;
use app\infrastructure\repository\BaseRepository;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\HttpFoundation\Response;
use InvalidArgumentException;
use Throwable;

/**
 * Class PostRepository
 */
class PostRepository extends BaseRepository
{
    private ClientInterface $client;

    /**
     * PostRepository constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $id
     * @return Post
     * @throws Throwable
     */
    public function get(int $id): Post
    {
        $request = $this->createRequest("https://jsonplaceholder.typicode.com/todos/$id");
        $response = $this->client->sendRequest($request);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return new Post($this->getData($response));
        }

        throw new InvalidArgumentException('Post not found');
    }

    /**
     * @return array
     * @throws Throwable
     */
    public function list(): array
    {
        $request = $this->createRequest('https://jsonplaceholder.typicode.com/todos');
        $response = $this->client->sendRequest($request);

        if (Response::HTTP_OK === $response->getStatusCode()) {
            return Post::arrayOf($this->getData($response));
        }

        return [];
    }
}
