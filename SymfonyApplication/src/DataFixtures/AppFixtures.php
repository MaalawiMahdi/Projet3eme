<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Entity\CategorieAide;
use App\Repository\CategorieAideRepository;
use App\Entity\Aide;
use Doctrine\Persistence\ObjectRepository;

class AppFixtures extends Fixture
{ 

 public function load(ObjectManager $manager)
    {        /*for ($i = 0; $i < 10; $i++) {
            $categorieAide = new CategorieAide();
            $categorieAide->setTitre('Categorie'.$i);
            $categorieAide->setLienIcon("categorie.png");
            $manager->persist($categorieAide);}
            $manager->flush();*/

    }
}
