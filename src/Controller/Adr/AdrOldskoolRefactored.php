<?php

namespace App\Controller\Adr;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class AdrOldskoolRefactored
{
    /**
     * REFACTOR [ AdrOldSkool::getBySlugAction ] here
     */
    public function __construct()
    {
        // inject what you need
    }

    #[Route(path: '/newskool/article/{slug}')]
    public function __invoke(): JsonResponse
    {

        return new JsonResponse(['Hello' => 'World']);
    }
}