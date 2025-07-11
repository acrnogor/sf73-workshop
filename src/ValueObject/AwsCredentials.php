<?php

namespace App\ValueObject;

final readonly class AwsCredentials
{
    public function __construct(
        private string $secretKey,
        private string $accessKey,
        private string $region,
    )
    {

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