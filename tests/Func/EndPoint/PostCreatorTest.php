<?php

namespace App\Tests\Unit\EndPoint;

use App\Entity\Post;
use App\Service\Post\Application\PostCreator;
use App\Service\Post\Infrastructure\OutputAdapter\PostOutputAdapter;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostCreatorTest extends WebTestCase
{

    // givenValidPost_WhenSavePost_thenVerifyContentResponse
    public function testcreatePost(): void
    {
        $client = static::createClient();
        $crawler = $client->request('POST', '/api/post');

        // Given
        $post = new Post();
        $post->setUserId(random_int(1, 10));
        $post->setTitle('whatever');
        $post->setBody('whatever');

        // WhenSavePost

        $postCreator = (new PostCreator())->createPost($post);

        // thenVerifyContentResponse
        $this->assertContainsEquals($postCreator, ['save' => 'ok']);
    }
}
