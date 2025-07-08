<?php

namespace App\Controller\Adr;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class AdrStructure
{
    public function __construct()
    {

    }

    #[Route(path: '/adr/structure')]
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(['Hello' => 'World']);
    }
}