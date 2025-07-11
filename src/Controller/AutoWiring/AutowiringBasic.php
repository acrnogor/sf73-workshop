<?php

namespace App\Controller\AutoWiring;

use App\Service\UsefulServiceOne;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final readonly class AutowiringBasic
{
    public function __construct(
        private readonly UsefulServiceOne $usefulServiceOne
    )
    {

    }

    #[Route(path: '/autowiring/basic')]
    public function __invoke(): JsonResponse
    {
        $this->usefulServiceOne->doUsefulWork();
        return new JsonResponse(['autowiring' => 'works']);
    }
}