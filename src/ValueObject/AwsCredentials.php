<?php

namespace App\ValueObject;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

final readonly class AwsCredentials
{
    public function __construct(
        #[Autowire(env: 'AWS_SECRET_KEY')]
        private string $secretKey,
        #[Autowire(env: 'AWS_ACCESS_KEY')]
        private string $accessKey,
        #[Autowire(env: 'AWS_REGION')]
        private string $region,
    ) {
        // constructor logic here
    }

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    public function getAccessKey(): string
    {
        return $this->accessKey;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function toArray(): array
    {
        return [
            'secretKey' => $this->getSecretKey(),
            'accessKey' => $this->getAccessKey(),
            'region' => $this->getRegion(),
        ];

    }
}