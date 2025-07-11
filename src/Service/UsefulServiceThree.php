<?php

namespace App\Service;

final class UsefulServiceThree
{
    public function __construct()
    {

    }

    public function doUsefulWork(): int
    {
        // Simulate some useful work
        usleep(600);

        return 3;
    }
}