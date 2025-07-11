<?php

namespace App\Controller\Routing;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class RoutingRequirementsDayOfWeekBad
{
    #[Route(
        path: '/routing/day-of-week/bad/{dayOfWeek?monday}',
    )]
    public function __invoke(string $dayOfWeek): JsonResponse
    {
        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        if (!in_array($dayOfWeek, $daysOfWeek, true)) {
            return new JsonResponse(['error' => 'Invalid day of the week'], 404);
        }

        return new JsonResponse(['dayOfWeek' => $dayOfWeek]);
    }
}