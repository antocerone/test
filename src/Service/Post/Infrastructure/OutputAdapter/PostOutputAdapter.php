<?php

namespace App\Service\Post\Infrastructure\OutputAdapter;

use App\Entity\Post;
use App\Service\Author\Application\AuthorDetail;
use App\Service\Author\Application\AuthorList;
use App\Service\Post\commonVars;
use App\Service\Post\Infrastructure\outputPort\IPostRepositoryOutputPort;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PostOutputAdapter implements IPostRepositoryOutputPort
{
    public function __construct(
        private readonly HttpClientInterface $client,
    ) {
    }

    public function save(Post $post): ?array
    {
        // save Post... App\Service\Post\Domain\PostRepository, App\Service\Post\Infrastructure\InputAdapter, etc
        return ['save' => 'ok'];
    }

    public function getAll(): ?array
    {
        $response = $this->client->request(
            'GET',
            commonVars::getInstance()::$path['jph'] . 'posts'
        );

        $content = (200 === $response->getStatusCode()) ? $response->toArray() : [];

        return $content;
    }

    public function getAllWithUser(): ?array
    {
        $content = $this->getAll();

        // MATCH AUTHOR
        $authors = new AuthorList($this->client);

        foreach ($authors->data as $author) {
            $authorToMath[$author['id']] = $author;
        }

        foreach ($content as $key => $post) {
            $content[$key]['userId'] = $authorToMath[$post['userId']] ?? $content[$key]['userId'];
        }

        return $content;
    }

    public function getPostById(int $id): ?array
    {
        $response = $this->client->request(
            'GET',
            commonVars::getInstance()::$path['jph'] . 'posts/' . $id
        );

        $content = (200 === $response->getStatusCode()) ? $response->toArray() : [];

        return $content;
    }

    public function getPostByIdWithAuthor(int $id): ?array
    {
        $content = $this->getPostById($id);

        // AUTHOR
        if (!empty($content)) {
            $author = new AuthorDetail($this->client, $content['userId']);
            $content['userId'] = $author->data;
        }

        return $content;
    }
}
