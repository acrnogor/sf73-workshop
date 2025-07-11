<?php

namespace App\Controller\Adr;

use App\Repository\ArticleRepository;
use App\Service\UsefulServiceOne;
use App\Service\UsefulServiceThree;
use App\Service\UsefulServiceTwo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Oldskool routing
 * - it's not bad per se, but it is not the best practice anymore
 * - we are smarter than that, and want to think long(er) term
 * - maintaining this is very often time-consuming - will explain why
 */
class AdrOldSkool extends AbstractController
{
    public function __construct(
        private readonly ArticleRepository $articleRepository,
        private readonly UsefulServiceOne $usefulServiceOne,
        private readonly UsefulServiceTwo $usefulServiceTwo,
        private readonly UsefulServiceThree $usefulServiceThree,
    ) {

    }
    #[Route(path: '/old/articles/{format?html}', name: 'old_articles_listing')]
    public function listingAction(string $format) // what's missing?
    {
        // you should never findAll, paginate! But - for the sake of the example - forgive me :-)
        $articles = $this->articleRepository->findAll();
        $this->usefulServiceOne->doUsefulWork();

        $data = [
            'articles' => $articles,
        ];

        if ($format === 'json') {
            $data = [
                'articles' => array_map(
                    fn($article) => [
                        'id' => $article->getId(),
                        'title' => $article->getTitle(),
                        'author' => $article->getAuthor(),
                        'category' => $article->getCategory(),
                        'slug' => $article->getSlug(),
                    ],
                    $articles
                ),
            ];
            return $this->json($data);
        }
        return $this->render('old/articles-listing.html.twig', $data);
    }

    #[Route(path: '/old/article/{slug}', name: 'old_articles_view')]
    public function getBySlugAction(?string $slug) // whats missing?
    {
        $article = $this->articleRepository->findOneBy(['slug' => $slug]);
        if ($article === null) {
            return $this->redirectToRoute('old_articles_listing');
        }

        $this->usefulServiceTwo->doUsefulWork();
        $this->usefulServiceThree->doUsefulWork();

        $data['article'] = $article;

        return $this->render('old/articles-view.html.twig', $data);
    }
}