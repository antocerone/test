<?php

namespace App\Service\Post\Infrastructure\InputAdapter;

use App\Entity\Post;
use App\Service\Post\Infrastructure\InputPort\PostInputPort;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PostInputAdapter implements PostInputPort
{
    public function __construct(
        private readonly HttpClientInterface $client,
    ) {
    }

    public function createPost(Post $post)
    {
    }

    public function fromForm(Request $json): array
    {
        // App\Repository\Post\PostRepository
        // App\Service\Post\Domain\PostRepository

        // $response = $this->client->request('POST', commonVars::getInstance()::$path['jph'] . 'posts');
        // $content = (200 === $response->getStatusCode()) ? $response->toArray() : [];

        // curl, etc
        return ['save' => 'ok'];
    }

    public function mappingCsv()
    {
    }

    public function curlCnx()
    {
    }
}
