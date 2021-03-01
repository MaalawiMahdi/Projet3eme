<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Sujet;
use App\Entity\User;
use App\Form\CommentaireType;
use http\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentaireController extends AbstractController
{
    /**
     * @Route("/commentaire", name="commentaire")
     */
    public function index(): Response
    {
        return $this->render('commentaire/index.html.twig', [
            'controller_name' => 'CommentaireController',
        ]);
    }
    /**
     * @Route("/SupprimerCommentaire/{idboard}/{id}/{idcom}", name="SupprimerCommentaire")
     */
    public function SupprimerCommentaire($idboard,$id,$idcom)
    {
        $comm = $this->getDoctrine()->getRepository( Commentaire::class)->find($idcom);
        $user = $this->getDoctrine()->getRepository( User::class)->find(1);
        if ($comm->getUser()===$user)
        {
            $em=$this->getDoctrine()->getManager();
            $em->remove($comm);
            $em->flush();
            return $this->redirectToRoute('ConsulterSujetFront',['idboard'=>$idboard,'id'=>$id]);
        }
        else
        {
            return $this->redirectToRoute('ConsulterSujetFront',['idboard'=>$idboard,'id'=>$id]);

        }

    }
    /**
     * @Route("/ModifierCommentaire/{idboard}/{id}/{idcom}", name="ModifierCommentaire")
     */
    public function ModifierCommentaire(Request $request,$idboard,$id,$idcom)
    {
        $sujet=$this->getDoctrine()->getRepository(Sujet::class)->find($id);
        $comm = $this->getDoctrine()->getRepository( Commentaire::class)->find($idcom);
        $user = $this->getDoctrine()->getRepository( User::class)->find(1);
        $f = $this->createForm(CommentaireType::class,$comm);
        $f->add('Valider', SubmitType::class);
        $f->handleRequest($request);
        if($f->isSubmitted()&&$f->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('ConsulterSujetFront',['idboard'=>$idboard,'id'=>$id]);
        }
        $listc=$this->getDoctrine()->getRepository(Commentaire::class)->findAll();
        return $this->render('sujet/modifiercommentairefront.html.twig',['sujet'=>$sujet, 'board_id'=>$idboard, 'f'=>$f->createView(),'listc'=>$listc, 'user'=>$user,'idcom'=>$idcom]);

    }
}
