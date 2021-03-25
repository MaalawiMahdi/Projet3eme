<?php

namespace App\Controller;

use App\Entity\Societe;
use App\Entity\User;
use App\Form\SocieteType;
use App\Repository\SocieteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class SocieteController extends AbstractController
{
    /**
     * @Route("/societe_demandes", name="societe_demandes")
     */
    public function afficherdemande(): Response
    {   $societe=$this->getDoctrine()->getRepository(Societe::class)->findBy(array('etat'=>true));
        $liste_des_demandes=$this->getDoctrine()->getRepository(Societe::class)->findBy(array('etat'=>false));
        return $this->render('societe/admin.html.twig', [
            'societes' => $societe,'liste_des_demandes'=>$liste_des_demandes
        ]);
    }
    /**
     * @Route("/societe_demandes/{id}", name="societe_show", methods={"GET"})
     */
    public function show(Societe $societe): Response
    {
        return $this->render('societe/show.html.twig', [
            'societe' => $societe,
        ]);
    }
    /**
     * @Route("/societe", name="societe_new", methods={"GET","POST"})
     */
    public function new(Request $request,SessionInterface $session): Response
    {   $user=$this->getDoctrine()->getRepository(User::class)->find($session->get('user')->getId());
        $existe=$user->getSociete();
        $societe = new Societe();
        if(is_null($existe)) {
            $societe->setEtat(false);
            $societe->setUseraccount($user);

            $form = $this->createForm(SocieteType::class, $societe);
            $form->add("Passer une candidature en tant que societe", SubmitType::class);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($societe);
                $entityManager->flush();
                $session->set('societe',$societe);
                return $this->redirectToRoute('societe_new');
            }

            return $this->render('societe/new.html.twig', [
                'societe' => $societe,
                'form' => $form->createView(),
                'user' => $user,
                'path'=>$session->get('path'),
                'texte'=>$session->get('texte'),
            ]);
        }else if($existe->getEtat()==false){
            return $this->render('societe/message.html.twig', [
                'message' => "votre demande est en cours de traitement",'user'=>$user,'etat'=>false
                ,'path'=>$session->get('path'),
                'texte'=>$session->get('texte'),
            ]);
        }else{
            return $this->render('societe/message.html.twig', [
                'message' => "Vous pouvez maintenant creer votre board",'user'=>$user,'etat'=>true
                ,'path'=>$session->get('path'),
                'texte'=>$session->get('texte'),
            ]);
        }

    }



    /**
     * @Route("/societe_demandes/confirmer/{id}", name="societe_confirmer", methods={"GET","POST"})
     */
    public function edit(Request $request, Societe $societe): Response
    {   $societe->getUseraccount()->setType('societe');
    $societe->setEtat(true);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('societe_demandes');

    }
    /**
     * @Route("societe/edit", name="societe_edit")
     */
    public function editfront(Request $request,SessionInterface $session): Response
    {   $session->start();
        $user=$session->get('user');
        $Societe=$session->get('user')->getSociete();
        $form = $this->createForm(SocieteType::class, $Societe);
        $form=$form->add("Enregister",SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('societe_new');
        }

        return $this->render('societe/frontedit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'texte'=>$session->get('texte'),
            'path'=>$session->get('path'),
        ]);
    }
    /**
     * @Route("societe/{id}", name="societe_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Societe $societe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$societe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($societe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('societe_index');
    }


}
