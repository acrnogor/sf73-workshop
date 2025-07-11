<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Article>
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findBySpecialMethod($slug): ?Article
    {
        /** @var Article $article */
        $article = $this->findOneBy(['slug' => $slug]);
        if (!$article) {
            return null;
        }

        $specialTitle = $article->getTitle() . '(special)';
        $article->setTitle($specialTitle);

        return $article;
    }

}
