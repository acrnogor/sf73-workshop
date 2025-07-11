<?php

namespace App\Controller\RoutingEntity;

use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment as Twig;

final readonly class ViewArticle
{
    public function __construct(
        private Twig $twig,
    ) {
    }

    #[Route(
        path: '/new/article/{id}/example',
        name: 'new_articles_view_by_id',
    )]
    public function __invoke(Article $article): Response
    {

        $body = $this->twig->render('new/articles-view.html.twig', [
            'article' => $article,
        ]);

        return new Response($body);
    }
}