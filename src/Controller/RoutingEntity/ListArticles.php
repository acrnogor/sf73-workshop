<?php

namespace App\Controller\RoutingEntity;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment as Twig;

final readonly class ListArticles
{
    public function __construct(
        private Twig $twig,
        private ArticleRepository $articleRepository
    ) {
    }

    #[Route(
        path: '/new/articles',
        name: 'new_articles_listing',
    )]
    public function __invoke(): Response
    {
        $body = $this->twig->render('new/articles-listing.html.twig', [
            'articles' => $this->articleRepository->findAll(),
        ]);

        return new Response($body);
    }
}