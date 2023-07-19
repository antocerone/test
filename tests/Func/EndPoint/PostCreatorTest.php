<?php

namespace App\Tests\Unit\EndPoint;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostCreatorTest extends WebTestCase
{

    // givenValidPost_WhenSavePost_thenVerifyContentResponse
    public function testcreatePost(): void
    {
        $client = static::createClient();

        // Given
        $post_form = [
            'post_form' => [
                'title' => 'test title',
                'body' => 'test body',
            ]
        ];

        // WhenSavePost
        $crawler = $client->request('POST', '/api/post', $post_form);

        // thenVerifyContentResponse
        $this->assertResponseIsSuccessful();
    }
}
