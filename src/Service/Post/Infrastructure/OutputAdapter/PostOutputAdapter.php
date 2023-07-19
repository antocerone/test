<?php

namespace App\Service\Post\Infrastructure\OutputAdapter;

use App\Entity\Post;
use App\Service\Author\Application\AuthorDetail;
use App\Service\Author\Application\AuthorList;
use App\Service\Post\commonVars;
use App\Service\Post\Infrastructure\OutputPort\IPostOutputPort;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PostOutputAdapter implements IPostOutputPort
{
    public function __construct(
        private readonly HttpClientInterface $client,
    ) {
    }

    public function saveFromForm(Post $post): array
    {
        // save by App\Service\Post\Infrastructure\InputAdapter
        // show dtoFront
        $dtoFront = ['title' => $post->getTitle(), 'body' => $post->getBody()];

        return [
            'save' => 'ok',
            'data' => $dtoFront
        ];
    }

    public function getAll(): ?array
    {
        $response = $this->client->request('GET', commonVars::getInstance()::$path['jph'] . 'posts');

        return (200 === $response->getStatusCode()) ? $response->toArray() : [];
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

    public function getPostById(int $id): array
    {
        $response = $this->client->request('GET', commonVars::getInstance()::$path['jph'] . 'posts/' . $id);

        return (200 === $response->getStatusCode()) ? $response->toArray() : [];
    }

    public function getPostByIdWithAuthor(int $id): array
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
