<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Form\LivraisonType;
use App\Repository\LivraisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/livraison")
 */
class LivraisonController extends AbstractController
{
    /**
     * @Route("/", name="livraison_index", methods={"GET"})
     */
    public function index(LivraisonRepository $livraisonRepository,SessionInterface $session): Response
    {  $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }else if($user->getType()!="admin")
        {   return $this->redirectToRoute('user_inscription');
        }
        return $this->render('livraison/index.html.twig', [
            'livraisons' => $livraisonRepository->findAll(),
        ]);
    }
    /**
     * @Route("/tri", name="livraison_tri" )
     */
    public function tri(SessionInterface $session): Response
    {   $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }else if($user->getType()!="admin")
        {   return $this->redirectToRoute('user_inscription');
        }
        return $this->render('livraison/index.html.twig', [
        'livraisons' => $this->getDoctrine()->getRepository(Livraison::class)->findBy(array(), array('prix' => 'DESC')),
    ]);
    }

    /**
     * @Route("/new", name="livraison_new", methods={"GET","POST"})
     */
    public function new(Request $request,SessionInterface $session): Response
    {$user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }else if($user->getType()!="admin")
        {   return $this->redirectToRoute('user_inscription');
        }
        $livraison = new Livraison();
        $livraison->setEtat(false);
        
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($livraison);
            $entityManager->flush();

            return $this->redirectToRoute('livraison_index');
        }

        return $this->render('livraison/new.html.twig', [
            'livraison' => $livraison,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="livraison_show", methods={"GET"})
     */
    public function show(Livraison $livraison,SessionInterface $session): Response
    {  $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }else if($user->getType()!="admin")
        {   return $this->redirectToRoute('user_inscription');
        }
        return $this->render('livraison/show.html.twig', [
            'livraison' => $livraison,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="livraison_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Livraison $livraison,SessionInterface $session): Response
    {$user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }else if($user->getType()!="admin")
        {   return $this->redirectToRoute('user_inscription');
        }
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('livraison_index');
        }

        return $this->render('livraison/edit.html.twig', [
            'livraison' => $livraison,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="livraison_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Livraison $livraison): Response
    {
        if ($this->isCsrfTokenValid('delete'.$livraison->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($livraison);
            $entityManager->flush();
        }

        return $this->redirectToRoute('livraison_index');
    }
    /**
     * @Route("/fin/{id}", name="livraison_fin",)
     */
    public function fin(Request $request, $id): Response
    {   $livraison=$this->getDoctrine()->getRepository(Livraison::class)->find($id);
        $livraison->setEtat(true);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('livraison_index');
    }

}
