<?php

namespace App\Controller\AutoWiring;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final readonly class AutowiringExpressions
{
    public function __construct(
        #[Autowire(expression: 'service("App\\\Service\\\UsefulServiceTwo").doUsefulWork()')]
        private int $workDoneByTwo,
    )
    {
        // Constructor logic can be added here if needed
    }

    #[Route(path: '/autowiring/expressions')]
    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'workDone' => $this->workDoneByTwo,
        ]);
    }
}