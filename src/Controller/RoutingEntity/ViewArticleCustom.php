<?php

namespace App\Controller\RoutingEntity;

use App\Entity\Article;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment as Twig;

final readonly class ViewArticleSpecial
{
    public function __construct(
        private Twig $twig
    ) {
    }

    #[Route(
        path: '/new/article/{slug}/special',
        name: 'new_articles_view_special',
    )]
    public function __invoke(
        #[MapEntity(expr: 'repository.findBySpecialMethod(slug)')]
        Article $article
    ): Response
    {
        $body = $this->twig->render('new/articles-view.html.twig', [
            'article' => $article,
        ]);

        return new Response($body);
    }
}