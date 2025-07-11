<?php

namespace App\Controller\AutoWiring;

use App\Service\FSStorage;
use App\Service\S3Storage;
use App\Service\SpecialStorageInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

/**
 * TIP:
 *  $ bin/console debug:autowiring
 */
final readonly class AutowiringInterfaceDIP
{
    public function __construct(
        #[Autowire('%kernel.project_dir%')]
        private string $projectRoot,
        private FSStorage $storage,
    ) {
        // constructor logic here
    }

    #[Route(path: '/autowiring/interface')]
    public function __invoke(): JsonResponse
    {
        $file = new File($this->projectRoot. '/README.md');

        $pathToFile = $this->storage->store($file);

        return new JsonResponse(['path' => $pathToFile]);
    }
}