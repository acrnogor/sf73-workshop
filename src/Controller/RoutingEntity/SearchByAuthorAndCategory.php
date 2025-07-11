<?php

namespace App\Controller\RoutingEntity;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment as Twig;

final readonly class SearchByAuthorAndCategory
{
    public function __construct(
        private Twig $twig,
        private ArticleRepository $articleRepository
    ) {
    }

    #[Route(
        path: '/new/articles/search/{category}/{author?}',
        name: 'new_articles_search',
    )]
    public function __invoke(?string $category, ?string $author): Response
    {
        $criteria = [];

        if ($category) {
            $criteria['category'] = $category;
        }

        if ($author) {
            $criteria['author'] = $author;
        }

        $body = $this->twig->render('new/articles-listing.html.twig', [
            'articles' => $this->articleRepository->findBy($criteria),
        ]);

        return new Response($body);
    }
}