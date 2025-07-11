<?php

namespace App\Controller\AutoWiring;

use App\Service\UsefulServiceOne;
use App\Service\UsefulServiceTwo;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final readonly class AutowiringGroupingRefactor
{
    public function __construct(
        #[Autowire(env: 'AWS_SECRET_KEY')]
        private string $awsSecretKey,
        #[Autowire(env: 'AWS_ACCESS_KEY')]
        private string $awsAccessKey,
        #[Autowire(env: 'AWS_REGION')]
        private string $awsRegion,
        private UsefulServiceOne $usefulServiceOne,
        private UsefulServiceTwo $usefulServiceTwo,
    )
    {

    }

    #[Route(path: '/autowiring/grouping')]
    public function __invoke(): JsonResponse
    {
        $one = $this->usefulServiceOne->doUsefulWork();
        $two = $this->usefulServiceTwo->doUsefulWork();

        return new JsonResponse([
            'secretKey' => $this->awsSecretKey,
            'accessKey' => $this->awsAccessKey,
            'region' => $this->awsRegion,
            'one' => $one,
            'two' => $two,
        ]);
    }
}