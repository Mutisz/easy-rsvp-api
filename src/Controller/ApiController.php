<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController
{
    #[Route('/echo', name: 'api_echo', methods: ['GET'])]
    public function echo(): JsonResponse
    {
        return new JsonResponse([
            'message' => 'Hello from your Symfony API!',
            'timestamp' => (new \DateTime())->format(\DateTimeInterface::ATOM),
        ]);
    }
}
