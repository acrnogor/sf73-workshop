<?php

namespace App\ValueObject;

final readonly class OfficeSafeCredentials
{
    public function __construct(
        private string $email,
        private string $password
    ) {
        // constructor logic here
    }

    public function getSecretKey(): string
    {
        return $this->email;
    }

    public function getAccessKey(): string
    {
        return $this->password;
    }

    public function toArray(): array
    {
        return [
            'email' => $this->getSecretKey(),
            'password' => $this->getAccessKey(),
        ];
    }
}