<?php

namespace App\Controller;

use App\Entity\Board;
use App\Entity\Commentaire;
use App\Entity\Sujet;
use App\Entity\User;
use App\Form\CommentaireType;
use App\Form\SujetType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Files;

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
     * @Route("/AfficherSujet/{idboard}", name="AfficherSujet")
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
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid())
            {
                $file = $Sujet->getLienImage();
                if ($file)
                {
                    $fileLink = md5(uniqid()).'.'.$file->guessExtension();
                    $file->move($this->getParameter('upload_directory'),$fileLink);
                    $Sujet->setLienImage($fileLink);
                    $em->persist($Sujet);
                    $em->flush();
                }
                else
                {
                    $em->persist($Sujet);
                    $em->flush();
                }
                return $this->redirectToRoute('AfficherSujet',['idboard'=> $idboard,]);
            }
        return $this->render('sujet/ajoutersujet.html.twig', [
            'form' => $form->createView(),'board_id'=>$idboard
        ]);
    }
    /**
     * @Route("/SupprimerSujet/{idboard}/{id}", name="SupprimerSujet")
     */
    public function SupprimerSujet($idboard,$id)
    {
        $sujet = $this->getDoctrine()->getRepository( Sujet::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($sujet);
        $em->flush();
        return $this->redirectToRoute('AfficherSujet',['idboard'=> $idboard,]);
    }
    /**
     * @Route("/ModifierSujet/{idboard}/{id}", name="ModifierSujet")
     */
    public function ModifiererSujet(Request $request,$idboard,$id)
    {
        $sujet = $this->getDoctrine()->getRepository( Sujet::class)->find($id);
        $form = $this->createForm(SujetType::class,$sujet);
        $form->remove('lien_image');
        $form->add('Modifier Image', SubmitType::class);
        $form->add('Modifier', SubmitType::class);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if ($form->isSubmitted()&&$form->isValid())
        {
            if ($form->getClickedButton() && 'Modifier Image' === $form->getClickedButton()->getName())
            {
                return $this->redirectToRoute('ModifierImage',['idboard'=>$idboard,'id'=>$id]);
            }
            else
            {
                $em->flush();
            }
            return $this->redirectToRoute('AfficherSujet',['idboard'=>$idboard]);

        }
        return $this->render('sujet/modifiersujet.html.twig', ['form'=>$form->createView(),'board_id'=>$idboard, 'sujet'=>$sujet]);
    }

    /**
     * @Route("/ModifierImage/{idboard}/{id}", name="ModifierImage")
     */
    public function ModifierImage(Request $request,$idboard,$id)
    {
        $sujet = $this->getDoctrine()->getRepository( Sujet::class)->find($id);
        $form = $this->createForm(SujetType::class,$sujet);
        $form->remove('titre');
        $form->remove('description');
        $form->add('Modifier', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $file = $sujet->getLienImage();
                $fileLink = md5(uniqid()).'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_directory'),$fileLink);
                $sujet->setLienImage($fileLink);
                $em=$this->getDoctrine()->getManager();
                $em->flush();
            return $this->redirectToRoute('ModifierSujet',['idboard'=>$idboard,'id'=>$id]);
        }
        return $this->render('sujet/modifierimage.html.twig', ['form'=>$form->createView(),'board_id'=>$idboard, 'sujet'=>$sujet]);

    }
    /**
     * @Route("/ConsulterSujet/{idboard}/{id}", name="ConsulterSujet")
     */
    public function ConsulterSujet(Request $request,$id,$idboard)
    {
        $sujet=$this->getDoctrine()->getRepository(Sujet::class)->find($id);
        return $this->render('sujet/consultersujet.html.twig',['sujet'=>$sujet, 'board_id'=>$idboard]);
    }
    /**
     * @Route("/AfficherSujetFront/{idboard}", name="AfficherSujetFront")
     */
    public function afficherFront($idboard): Response
    {
        $list = $this->getDoctrine()->getRepository(Sujet::class)->findBy(array('board' => $idboard));
        return $this->render('sujet/frontaffichersujet.html.twig',['list'=>$list, 'board_id'=>$idboard]);
    }
    /**
     * @Route("/ConsulterSujetFront/{idboard}/{id}", name="ConsulterSujetFront")
     */
    public function ConsulterSujetFront(Request $request,$idboard,$id)
    {
        $sujet=$this->getDoctrine()->getRepository(Sujet::class)->find($id);
        $user=$this->getDoctrine()->getRepository(User::class)->find(1);
        $comm = new Commentaire();
        $comm->setSujet($sujet);
        $comm->setUser($user);
        $f = $this->createForm(CommentaireType::class,$comm);
        $f->add('Commenter', SubmitType::class);
        $f->handleRequest($request);
        if ($f->isSubmitted()&&$f->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($comm);
            $em->flush();
            return $this->redirectToRoute('ConsulterSujetFront',['idboard'=>$idboard,'id'=>$id]);
        }
        $listc=$this->getDoctrine()->getRepository(Commentaire::class)->findAll();
        return $this->render('sujet/consultersujetfront.html.twig',['sujet'=>$sujet, 'board_id'=>$idboard, 'f'=>$f->createView(),'listc'=>$listc, 'user'=>$user]);
    }
    /**
     * @Route("/AjouterSujetFront/{idboard}", name="AjouterSujetFront")
     */
    public function AjouterSujetFront(Request $request,$idboard)
    {
        $Sujet = new Sujet();
        $board = $this->getDoctrine()->getRepository(Board::class)->find($idboard);
        $Sujet->setBoard($board);
        $form= $this->createForm(SujetType::class,$Sujet);
        $form->add('Ajouter',SubmitType::class);
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $file = $Sujet->getLienImage();
            if ($file)
            {
                $fileLink = md5(uniqid()).'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_directory'),$fileLink);
                $Sujet->setLienImage($fileLink);
                $em->persist($Sujet);
                $em->flush();
            }
            else
            {
                $em->persist($Sujet);
                $em->flush();
            }
            return $this->redirectToRoute('AfficherSujetFront',['idboard'=> $idboard,]);
        }
        return $this->render('sujet/ajoutersujetfront.html.twig', [
            'form' => $form->createView(),'board_id'=>$idboard
        ]);
    }
}
