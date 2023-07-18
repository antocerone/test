<?php

namespace App\Service\Post\Application;

use App\Service\Post\Infrastructure\OutputAdapter\PostOutputAdapter;

class PostList
{
    public function __construct(
        private PostOutputAdapter $postOutputAdapter,
    ) {
    }

    public function getAllWithUser()
    {
        return $this->postOutputAdapter->getAllWithUser();
    }
}
