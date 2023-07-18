<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

use App\Service\ClientDataService;
use App\Service\Post\Application\PostCreator;
use App\Service\Post\Application\PostDetail;
use App\Service\Post\Application\PostList;
use App\Service\Post\Domain\Form\PostFormType;
use Symfony\Component\HttpFoundation\JsonResponse;

class PostController extends AbstractController
{
    public array $data;

    public function __construct(
        ClientDataService $clientDataService,
        private HttpClientInterface $client,
    ) {
        $this->data = (array) $clientDataService;
    }

    #[Route(
        path: '/post/{id}',
        name: 'app_post_show',
        requirements: ['id' => '\d+'],
    )]
    public function index(PostDetail $postDetail, int $id): Response
    {
        $this->data['post'] = $postDetail->getPostDetail($id);

        $this->data['user'] = $this->getUser();
        return $this->render($this->data['client']['title'] . '/Post/detail.html.twig', $this->data);
    }


    #[Route('/api/get', name: 'endpoint_get_Post', methods: ['GET'])]
    public function getPost(PostList $PostList): JsonResponse
    {
        return $this->json($PostList->getAllWithUser());
    }


    #[Route(
        path: '/api/get/{id}',
        name: 'endpoint_getPostDetail',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function getPostDetail(PostDetail $postDetail, int $id): JsonResponse
    {
        return $this->json($postDetail->getPostDetail($id));
    }


    #[Route('/api/post', name: 'endpoint_postCreator', methods: ['GET', 'POST'])]
    public function createPost(Request $request, PostCreator $postCreator): Response
    {
        $post = new Post();
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);

        // if ($request->isMethod('POST')) {
        // $form->submit($request->request->get($form->getName()));
        if ($form->isSubmitted() && $form->isValid()) {
            // insertion Post data...
            // Options 1: App\Service\Post\Application\PostCreator
            // Options 2: App\Repository\Post\PostRepository

            $postToCreate = new Post();
            $postToCreate->setTitle($request->get('post_form')['title']);
            $postToCreate->setBody($request->get('post_form')['body']);

            $createPost = $postCreator->createPost($postToCreate);

            // uncomment for fun
            // $createPost = [];

            if (!empty($createPost)) {
                return $this->json($postCreator->createPost($post));
            } else {
                $this->data['modal']['show']        = true;
                $this->data['modal']['title']       = 'Create Post';
                $this->data['modal']['message'][]   = 'Sorry, your comment has not been processed :(';
                $this->data['modal']['message'][]   = 'Fire fire!! Cant connect with post services!';
                $this->data['modal']['mode']        = 'modal';
                $this->data['modal']['type']        = 'info';
            }
        }
        // }

        $this->data['postForm'] = $form->createView();

        return $this->render($this->data['client']['title'] . '/Post/create.html.twig', $this->data);
    }
}
