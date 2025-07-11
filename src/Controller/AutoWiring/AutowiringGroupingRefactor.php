<?php

namespace App\Controller\AutoWiring;

use App\Service\UsefulServiceOne;
use App\Service\UsefulServiceTwo;
use App\ValueObject\AwsCredentials;
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
        #[Autowire(env: 'OFFICESAFE_EMAIL')]
        private string $osEmail,
        #[Autowire(env: 'OFFICESAFE_PASSWORD')]
        private string $osPassword,
        private UsefulServiceTwo $usefulServiceTwo,
    ) {
        // constructor logic here
    }

    #[Route(path: '/autowiring/grouping')]
    public function __invoke(): JsonResponse
    {
        $two = $this->usefulServiceTwo->doUsefulWork();

        return new JsonResponse([
            'aws' => [
                'secretKey' => $this->awsSecretKey,
                'accessKey' => $this->awsAccessKey,
                'region' => $this->awsRegion,
            ],
            'os' => [
                'email' => $this->osEmail,
                'password' => $this->osPassword,
            ],
            'region' => $this->awsRegion,
            'two' => $two,
        ]);
    }
}