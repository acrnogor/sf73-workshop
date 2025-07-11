<?php

namespace App\Controller\Routing;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class RoutingRequirements
{
    #[Route(
        path: '/routing/articles/{page?1}',
        requirements: ['page' => '\d+'],
    )]
    public function __invoke(string $page): JsonResponse
    {
        return new JsonResponse(['page' => $page]);
    }
}