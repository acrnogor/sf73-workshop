<?php

namespace App\Controller\Routing;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class RoutingOne
{
    #[Route(
        path: '/routing/{devot}',
    )]
    public function __invoke(string $devot, Request $request): JsonResponse
    {
        return new JsonResponse(['param' => $devot]);
    }

}