<?php

namespace App\Controller\Routing;

use App\Enum\DayOfWeek;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class RoutingRequirementsDayOfWeekGood
{
    #[Route(
        path: '/routing/day-of-week/good/{dayOfWeek?monday}',
    )]
    public function __invoke(DayOfWeek $dayOfWeek): JsonResponse
    {
        return new JsonResponse(['dayOfWeek' => $dayOfWeek]);
    }
}