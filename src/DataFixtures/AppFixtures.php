<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $slugify = new Slugify();
        $faker = Factory::create('en_US');

        $categories = ['sport', 'tech', 'health'];
        $authors = ['kevin', 'bob', 'dave', 'karen'];

        for ($i = 0; $i < 50; $i++) {
            $article = new Article();
            $article->setTitle($faker->words(3, true));
            $article->setContent($faker->paragraph(1, true));
            $article->setCreatedAt($faker->dateTime());
            $article->setCategory($faker->randomElement($categories));
            $article->setAuthor($faker->randomElement($authors));
            $article->setSlug($slugify->slugify($article->getTitle()));

            $manager->persist($article);
        }

        $manager->flush();
    }
}
