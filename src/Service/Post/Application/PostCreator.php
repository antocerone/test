<?php

namespace App\Service\Post\Application;

use App\Entity\Post;
use App\Service\Post\Infrastructure\InputPort\PostInputPort;
use App\Service\Post\Infrastructure\OutputAdapter\PostOutputAdapter;
use Symfony\Component\HttpFoundation\Request;

/**
 * InputAdapter (use InputPort) ➝ InputPort ⇽ PostCreator (implements InputPort, use OutputAdapter) ➝ OutputPort ⇽ OutputAdapter (implements OutputPort)
 */
class PostCreator implements PostInputPort
{
    public function __construct(
        private PostOutputAdapter $postOutputAdapter,
    ) {
        // $this->validator = ...
    }

    public function createPost(Post $post)
    {
    }

    public function fromForm(Request $request)
    {
        // ex call valid data 
        // $title = $this->validator->title($request->get('post_form')['title']);

        $post = new Post();
        $post->setTitle($request->get('post_form')['title']);
        $post->setBody($request->get('post_form')['body']);

        return $this->postOutputAdapter->saveFromForm($post);
    }

    public function mappingCsv()
    {
    }

    public function curlCnx()
    {
    }
}
