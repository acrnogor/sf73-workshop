<?php

namespace App\Controller\Routing;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class RoutingDefaults
{
    #[Route(
        path: '/routing/defaults/{number?0}',
        // path: '/routing/defaults/{number?}',
    )]
    public function __invoke(?string $number): JsonResponse
    {
        return new JsonResponse(['number' => $number]);
    }
}