<?php

namespace App\Controller\AutoWiring;

use App\Service\UsefulServiceOne;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final readonly class AutowiringEnvVars
{
    public function __construct(
        #[Autowire(env: 'AWS_SECRET_KEY')]
        private string $awsSecretKey,
        #[Autowire(env: 'AWS_ACCESS_KEY')]
        private string $awsAccessKey,
        #[Autowire(env: 'AWS_REGION')]
        private string $awsRegion
    )
    {

    }

    #[Route(path: '/autowiring/env-vars')]
    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'secretKey' => $this->awsSecretKey,
            'accessKey' => $this->awsAccessKey,
            'region' => $this->awsRegion,
        ]);
    }
}