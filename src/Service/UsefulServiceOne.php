<?php

namespace App\Service;

final class UsefulServiceOne implements UsefulServiceInterface
{
    public function __construct()
    {
        // constructor logic here
    }

    public function doUsefulWork(): int
    {
        // Simulate some useful work
        usleep(800);

        return 1;
    }

    public function checkSomething(): bool
    {
        // Simulate checking something useful
        return true;
    }
}