<?php
/**
 * Created by PhpStorm.
 * User: ozcan
 * Date: 24/01/2018
 * Time: 16:32
 */

namespace DataFixtures;


use AppBundle\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 20; $i++){
            $article = new Article();
            $article->setTitre("Banque");
            $article->setDescription("frer du teushi stp");
            $article->setDate(new \DateTime(now));
            $article->setIsactif(true);
            $manager->persist($article);
        }

        $manager->flush();
    }
}