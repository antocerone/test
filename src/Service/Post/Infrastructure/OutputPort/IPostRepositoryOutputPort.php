<?php

namespace App\Service\Post\Infrastructure\outputPort;

use App\Entity\Post;

/**
 * Instead of "App\Service\Post\Domain\PostEntity" we will use "App\Entity\Post" just to facilitate the validation of the form (Req 04: Endpoint POST)
 */
interface IPostRepositoryOutputPort
{
    public function save(Post $post);
    public function getAll();
    public function getAllWithUser();
    public function getPostById(int $id);
    public function getPostByIdWithAuthor(int $id);
}
