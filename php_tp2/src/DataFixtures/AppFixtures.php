<?php

namespace App\DataFixtures;

use App\Entity\Bibliotheque;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $bib = new Bibliotheque("1","Ma bibliotheque","Oz","rue de la bib");
        $manager->persist($bib);

        $manager->flush();
    }
}