<?php

namespace App\Controller;

use App\Entity\Sujet;
use App\Form\SujetType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SujetController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(): Response
    {
        return $this->render('main.html.twig', [
            'controller_name' => 'SujetController',
        ]);
    }
    /**
     * @Route("/AfficherSujet", name="Afficher")
     */
    public function afficher(): Response
    {
        return $this->render('afficher.html.twig');
    }



    /**
     * @Route("/AjouterSujet", name="AjouterSujet")
     */
    public function AjouterSujet()
    {     $Sujet = new Sujet();
        $form= $this->createForm(SujetType::class,$Sujet);

        return $this->render('template.html.twig', [
            'form' => $form->createView(),
        ]);

    }

}
