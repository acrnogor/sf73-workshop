<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\File;

final class S3Storage //implements SpecialStorageInterface
{
    public function __construct()
    {
        // constructor logic here
    }

    public function store(File $file): string
    {
        return '/s3/'. $file->getFilename();
    }

}