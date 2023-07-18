<?php

namespace App\Service\Post\Infrastructure\InputPort;

use App\Entity\Post;
use Symfony\Component\HttpFoundation\Request;

interface PostInputPort
{
    public function createPost(Post $post);
    public function fromForm(Request $json);
    public function mappingCsv();
    public function curlCnx();
}
