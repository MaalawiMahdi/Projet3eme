<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\CategorieAide;
use App\Form\CategorieAideType;

use App\Form\SearchCategorieAidesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CategorieAideController extends AbstractController
{
    /**
     * @Route("/categorie_aide", name="categorie_aide")
     */
    public function index(): Response
    {
        return $this->render('categorie_aide/index.html.twig', [
            'controller_name' => 'CategorieAideController',
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/AfficherCategorieAide", name="AfficherCategorieAide")
     */
    public function listCategoriesAide(Request $request): Response
    {
        $categoriesAide = $this->getDoctrine()->getRepository(CategorieAide::class)->findAll();
        $form=$this->createForm(SearchCategorieAidesType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {   $data=$form->getData();
            $titre=$data['recherche'];
            $categorieAidefind=$this->getDoctrine()->getRepository(CategorieAide::class)->search($titre);
            return $this->render('categorie_aide/listCategoriesAide.html.twig', ['listCategorieAide' => $categorieAidefind,'formSearch'=>$form->createView(),]);
        }
        return $this->render('categorie_aide/listCategoriesAide.html.twig', ['listCategorieAide' => $categoriesAide,'formSearch'=>$form->createView(),]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/AfficherCategorieAides/{iduser}", name="AfficherCategorieAides")
     */
    public function listCategoriesAides($iduser,Request $request): Response
    {
        $categoriesAide = $this->getDoctrine()->getRepository(CategorieAide::class)->findAll();
        $form=$this->createForm(SearchCategorieAidesType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            $data=$form->getData();
            $titre=$data['recherche'];
            $categoriesAidefind=$this->getDoctrine()->getRepository(CategorieAide::class)->search($titre);
            return $this->render('categorie_aide/listCategoriesAides.html.twig', ['listCategorieAides' => $categoriesAidefind,'iduser'=>$iduser,'formSearch'=>$form->createView(),]);

        }
        return $this->render('categorie_aide/listCategoriesAides.html.twig', ['listCategorieAides' => $categoriesAide,'iduser'=>$iduser,'formSearch'=>$form->createView(),]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route ("/ajouterCategorieAide" , name="ajouterCategorieAide")
     */
    public function ajouterCategorieAide(Request $request)
    {
        $CategorieAide= new CategorieAide();
        $form= $this->createForm(CategorieAideType::class,$CategorieAide);
        $form->add('ajouter',SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['imageFile']->getData();
            if ($uploadedFile)
            {
                $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $CategorieAide->setLienIcon($newFilename);
            }
            $em=$this->getDoctrine()->getManager();
            $em->persist($CategorieAide);
            $em-> flush();
            return $this->redirectToRoute('AfficherCategorieAide');

        }
        return $this->render('categorie_aide/ajouterCategoriesAide.html.twig', ['formAjouterCategorieAide' => $form->createView()]);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("/supprimerCategorieAide/{id}" , name="supprimerCategorieAide")
     */
    public function SupprimerCategorieAide($id)
    {
        $CategorieAidefind = $this->getDoctrine()->getRepository(CategorieAide::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($CategorieAidefind);
        $em->flush();
        return $this->redirectToRoute('AfficherCategorieAide');

    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route ("/modifierCategorieAide/{id}" , name="modifierCategorieAide")
     */
    public function modifierCategorieAide($id, Request $request)
    {
        $CategorieAidefind = $this->getDoctrine()->getRepository(CategorieAide::class)->findBy(['id' => $id])[0];
        $form = $this->createForm(CategorieAideType::class, $CategorieAidefind);
        $form->add('modifier', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['imageFile']->getData();
            if ($uploadedFile)
            {
                $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $CategorieAidefind->setLienIcon($newFilename);
            }

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('AfficherCategorieAide');

        }
        return $this->render('categorie_aide/modifierCategoriesAide.html.twig', ['formModifierCategorieAide' => $form->createView()]);

    }

}
