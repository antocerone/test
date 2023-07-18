<?php

namespace App\Service\Author\Application;

use App\Service\Author\Infrastructure\OutputAdapter\AuthorOutputAdapter;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AuthorDetail
{
    public $data = [];

    public function __construct(
        private HttpClientInterface $client,
        int $id
    ) {
        $authorOutputAdapter = new AuthorOutputAdapter($client);
        $this->data = $authorOutputAdapter->getAuthorById($id);
    }
}
