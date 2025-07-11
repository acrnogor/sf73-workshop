<?php

namespace App\Service;

final class UsefulServiceTwo
{
    public function __construct()
    {

    }

    public function doUsefulWork(): void
    {
        // Simulate some useful work
        usleep(400);
    }
}