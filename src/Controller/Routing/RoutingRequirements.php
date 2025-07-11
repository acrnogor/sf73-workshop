<?php

namespace App\Controller\Routing;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class RoutingRequirements
{
    #[Route(
        path: '/routing/articles/{page?1}/{direction?asc}',
        requirements: [
            'page' => '\d+',
            'direction' => '(asc|desc|ASC|DESC)',
        ],
    )]
    public function __invoke(string $page, string $direction): JsonResponse
    {
        return new JsonResponse([
            'page' => $page,
            'direction' => $direction,
        ]);
    }
}