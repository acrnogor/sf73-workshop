<?php

namespace App\Controller\Routing;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class RoutingRequirementsRegex
{
    #[Route(
        path: '/routing/regex/{region}/{container}',
        requirements: [
            // really loose AWS region format: e.g. us-east-1, eu-west-3
            'region' => '[a-z]{2}-[a-z]+-\d+',
            // UUID v4 format
            'container' => '[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}'
        ]
    )]
    public function __invoke(string $region, string $container): JsonResponse
    {
        return new JsonResponse([
            'region' => $region,
            'container_uuid' => $container
        ]);
    }
}