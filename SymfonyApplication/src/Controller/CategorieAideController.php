<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieAideController extends AbstractController
{
    /**
     * @Route("/categorieAide", name="categorieAide")
     */
    public function index(): Response
    {
        return $this->render('categorie_aide/index.html.twig', [
            'controller_name' => 'CategorieAideController',
        ]);
    }


}
