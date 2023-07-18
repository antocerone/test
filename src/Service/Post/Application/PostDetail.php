<?php

namespace App\Service\Post\Application;

use App\Service\Post\Infrastructure\OutputAdapter\PostOutputAdapter;

class PostDetail
{
    public function __construct(
        private PostOutputAdapter $postOutputAdapter,
    ) {
    }

    public function getPostDetail(int $id)
    {
        return $this->postOutputAdapter->getPostByIdWithAuthor($id);
    }
}
