<?php

namespace App\Controller\AutoWiring;

use App\Service\UsefulServiceOne;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final readonly class AutowiringBasic
{
    public function __construct(
        private UsefulServiceOne $usefulServiceOne
    ) {
        // constructor logic here
    }

    #[Route(path: '/autowiring/basic')]
    public function __invoke(): JsonResponse
    {
        $one = $this->usefulServiceOne->doUsefulWork();
        return new JsonResponse([
            'autowiring' => 'works',
            'result' => $one,
        ]);
    }
}