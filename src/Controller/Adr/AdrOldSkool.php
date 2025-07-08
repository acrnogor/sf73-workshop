<?php

namespace App\Controller\Adr;

use App\Repository\ArticleRepository;
use App\Service\UsefulServiceOne;
use App\Service\UsefulServiceThree;
use App\Service\UsefulServiceTwo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdrOldSkool extends AbstractController
{
    public function __construct(
        private readonly ArticleRepository $articleRepository,
        private readonly UsefulServiceOne $usefulServiceOne,
        private readonly UsefulServiceTwo $usefulServiceTwo,
        private readonly UsefulServiceThree $usefulServiceThree,
    ) {

    }
    #[Route(path: '/articles', name: 'articles_listing')]
    public function listingAction(): Response
    {
        // you should never findAll, paginate! But - for the sake of the example - forgive me :-)
        $articles = $this->articleRepository->findAll();
        $this->usefulServiceOne->doUsefulWork();

        $data = ['articles' => $articles];

        return $this->render('articles-listing.html.twig', $data);
    }

    #[Route(path: '/article/{slug}', name: 'articles_view')]
    public function getBySlugAction(?string $slug)
    {
        $article = $this->articleRepository->findOneBy(['slug' => $slug]);
        if ($article === null) {
            return $this->redirectToRoute('articles_listing');
        }

        $this->usefulServiceTwo->doUsefulWork();
        $this->usefulServiceThree->doUsefulWork();

        $data['article'] = $article;

        return $this->render('articles-view.html.twig', $data);

    }
}