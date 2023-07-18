<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

use App\Service\ClientDataService;
use App\Service\Mail\UserRegistration;

class HomeController extends AbstractController
{
	public array $data;

	public function __construct(ClientDataService $clientDataService)
	{
		$this->data = (array) $clientDataService;
	}

	#[Route('/', name: 'app_home')]
	public function index(): Response
	{
		$this->data['user'] = $this->getUser();

		return $this->render('home.html.twig', $this->data);
	}

	#[Route('/client', name: 'app_clients_index')]
	public function app_clients_index(): Response
	{
		$this->data['user'] = $this->getUser();

		return $this->render('home.html.twig', $this->data);
	}

	#[Route('/forgot_password', name: 'app_forgot_password')]
	public function app_forgot_password(): Response
	{
		$this->data['user'] = $this->getUser();

		return $this->render('home.html.twig', $this->data);
	}

	#[Route('/login', name: 'app_login_form')]
	public function app_login_form(): Response
	{
		$this->data['user'] = $this->getUser();

		return $this->render('home.html.twig', $this->data);
	}

	#[Route('/register', name: 'app_register_user')]
	public function app_register_user(): Response
	{
		$this->data['user'] = $this->getUser();

		return $this->render('home.html.twig', $this->data);
	}
}
