<?php

namespace App\Service;

final class UsefulServiceThree
{
    public function __construct()
    {

    }

    public function doUsefulWork(): void
    {
        // Simulate some useful work
        usleep(600);
    }
}