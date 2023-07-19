<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HealthCheck
{
    #[Route('/health_check', name: 'health_check')]
    public function __invoke(): Response
    {
        return new JsonResponse();
    }
}
