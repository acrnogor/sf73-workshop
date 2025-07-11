<?php

namespace App\Service;

final class UsefulServiceThree
{
    public function __construct()
    {
        // constructor logic here
    }

    public function doUsefulWork(): int
    {
        // Simulate some useful work
        usleep(600);

        return 3;
    }

    public function validateUsingAI(): bool
    {
        // Simulate validating something with AI
        return true;
    }
}