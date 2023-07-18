<?php

namespace App\Service\Author\Infrastructure\OutputAdapter;

// use App\Entity\Author;
use App\Service\Post\commonVars;
use App\Service\Author\Infrastructure\OutputPort\IAuthorRepositoryOutputPort;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AuthorOutputAdapter implements IAuthorRepositoryOutputPort
{
    public function __construct(
        private HttpClientInterface $client,
    ) {
    }

    public function getAll(): ?array
    {
        $response = $this->client->request(
            'GET',
            commonVars::getInstance()::$path['jph'] . 'users'
        );

        $content = (200 === $response->getStatusCode()) ? $response->toArray() : [];

        return $content;
    }

    public function getAuthorById(int $id): ?array
    {
        $response = $this->client->request(
            'GET',
            commonVars::getInstance()::$path['jph'] . 'users/' . $id
        );

        $content = (200 === $response->getStatusCode()) ? $response->toArray() : [];

        return $content;
    }
}
