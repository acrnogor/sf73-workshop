<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\File;

interface SpecialStorageInterface
{
    public function store(File $file): string;
}