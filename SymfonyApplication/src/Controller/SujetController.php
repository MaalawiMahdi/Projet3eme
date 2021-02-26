<?php

namespace App\Controller;

use App\Entity\Board;
use App\Entity\Sujet;
use App\Form\SujetType;
use phpDocumentor\Reflection\Types\Integer;
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
     * @Route("/AfficherSujet/{idboard}", name="Afficher")
     */
    public function afficher($idboard): Response
    {
        $list = $this->getDoctrine()->getRepository(Sujet::class)->findBy(array('board' => $idboard));
        return $this->render('sujet/affichersujet.html.twig',['list'=>$list, 'board_id'=>$idboard]);
    }



    /**
     * @Route("/AjouterSujet/{idboard}", name="AjouterSujet")
     */
    public function AjouterSujet(Request $request,$idboard)
    {
        $Sujet = new Sujet();
        $board = $this->getDoctrine()->getRepository(Board::class)->find($idboard);
        $Sujet->setBoard($board);
        $form= $this->createForm(SujetType::class,$Sujet);
        $form->add('Ajouter',SubmitType::class);
        $form->handleRequest($request);
            if($form->isSubmitted())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($Sujet);
                $em->flush();
                return $this->redirectToRoute('Afficher',['idboard'=> $idboard,]);
            }
        return $this->render('sujet/ajoutersujet.html.twig', [
            'form' => $form->createView(),
        ]);

    }

}
