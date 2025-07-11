<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\File;

final class FSStorage implements SpecialStorageInterface
{
    public function __construct()
    {
        // constructor logic here
    }

    public function store(File $file): string
    {
        return '/filesystem/'. $file->getFilename();
    }

}