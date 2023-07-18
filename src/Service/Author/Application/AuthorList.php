<?php

namespace App\Service\Author\Application;

use App\Service\Author\Infrastructure\OutputAdapter\AuthorOutputAdapter;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class AuthorList
{
    public $data = [];

    public function __construct(
        private HttpClientInterface $client,
    ) {
        $this->data = (new AuthorOutputAdapter($client))->getAll();
    }
}
