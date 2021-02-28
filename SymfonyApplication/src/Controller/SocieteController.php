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
use Symfony\Component\Routing\Annotation\Route;


class SocieteController extends AbstractController
{

    /**
     * @Route("/societe/{iduser}", name="societe_new", methods={"GET","POST"})
     */
    public function new(Request $request,$iduser): Response
    {   $user=$this->getDoctrine()->getRepository(User::class)->find($iduser);
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

                return $this->redirectToRoute('societe_index', array('iduser' => $user->getId()));
            }

            return $this->render('societe/new.html.twig', [
                'societe' => $societe,
                'form' => $form->createView(),
                'user' => $user
            ]);
        }else if($existe->getEtat()==false){
            return $this->render('societe/message.html.twig', [
                'message' => "votre demande est en cours de traitement",'user'=>$user
            ]);
        }else{
            return $this->render('societe/message.html.twig', [
                'message' => "Vous pouvez maintenant creer votre board",'user'=>$user
            ]);
        }

    }

    /**
     * @Route("societe/{id}", name="societe_show", methods={"GET"})
     */
    public function show(Societe $societe): Response
    {
        return $this->render('societe/show.html.twig', [
            'societe' => $societe,
        ]);
    }

    /**
     * @Route("societe/{id}/edit", name="societe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Societe $societe): Response
    {
        $form = $this->createForm(SocieteType::class, $societe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('societe_index');
        }

        return $this->render('societe/edit.html.twig', [
            'societe' => $societe,
            'form' => $form->createView(),
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
