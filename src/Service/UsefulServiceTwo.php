<?php

namespace App\Service;

final class UsefulServiceTwo
{
    public function __construct()
    {
        // constructor logic here
    }

    public function doUsefulWork(): int
    {
        // Simulate some useful work
        usleep(400);

        return 2;
    }
}