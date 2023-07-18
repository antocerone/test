<?php

namespace App\Service\Post\Application;

use App\Entity\Post;
use App\Service\Post\Infrastructure\OutputAdapter\PostOutputAdapter;

class PostCreator
{
    public function __construct(
        private PostOutputAdapter $postOutputAdapter,
    ) {
    }

    public function createPost(Post $post)
    {
        return $this->postOutputAdapter->save($post);
    }
}
