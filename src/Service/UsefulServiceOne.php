<?php

namespace App\Service;

final class UsefulServiceOne implements UsefulWorkInterface
{
    public function __construct()
    {

    }

    public function doUsefulWork(): int
    {
        // Simulate some useful work
        usleep(800);

        return 1;
    }
}