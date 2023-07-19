<?php

namespace App\Controller;

use App\Service\ClientDataService;
use App\Service\Post\Application\PostList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    public array $data;

    public function __construct(
        ClientDataService $clientDataService,
    ) {
        $this->data = (array) $clientDataService;
    }

    #[Route('/blog', name: 'app_blogs_show')]
    public function index(PostList $PostList): Response
    {
        $this->data['posts'] = $PostList->getAllWithUser();

        $this->data['user'] = $this->getUser();

        return $this->render($this->data['client']['title'] . '/Blog/index.html.twig', $this->data);
    }


    #[Route(
        path: '/blog/{id}',
        name: 'app_blog_by_id',
        requirements: ['id' => '\d+'],
    )]
    public function getBlog(PostList $PostList, int $id): Response
    {
        if (!is_numeric($id)) {
            throw new \Exception('Invalid strength passed ' . $id);
        }
        return $this->index($PostList);
    }
}
