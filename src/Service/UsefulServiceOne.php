<?php

namespace App\Service;

final class UsefulServiceOne
{
    public function __construct()
    {

    }

    public function doUsefulWork(): void
    {
        // Simulate some useful work
        usleep(800);
    }
}