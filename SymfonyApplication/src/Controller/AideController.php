<?php

namespace App\Controller;

use App\Form\AideType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Aide;

use Symfony\Component\HttpFoundation\File\UploadedFile;



class AideController extends AbstractController
{
    /**
     * @Route("/aide", name="aide")
     */
    public function index(): Response
    {
        return $this->render('aide/index.html.twig', [
            'controller_name' => 'AideController',
        ]);
    }

    /**
     * @return Response
     * @Route("/AfficherAide", name="AfficherAide")
     */
    public function listAide(): Response
    {
        $Aide = $this->getDoctrine()->getRepository(Aide::class)->findAll();
        return $this->render('aide/listAide.html.twig', ['listAide' => $Aide,]);
    }
    /**
     * @return Response
     * @Route("/AfficherAides/{id}/{iduser}", name="AfficherAides")
     */
    public function listAides($iduser,$id): Response
    {   $Aidefind = $this->getDoctrine()->getRepository(Aide::class)->findBy(array('categorie'=>$id));
        return $this->render('aide/listAides.html.twig', ['listAides' => $Aidefind,'iduser'=>$iduser,]);
    }
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route ("/ajouterAide" , name="ajouterAide")
     */
    public function ajouterAide(Request $request)
    {
        $Aide = new Aide();
        $form = $this->createForm(AideType::class, $Aide);
        $form->add('ajouter', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

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
                $Aide->setLienImage($newFilename);
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($Aide);
            $em->flush();
            return $this->redirectToRoute('AfficherAide');

        }
        return $this->render('aide/ajouterAide.html.twig', ['formAjouterAide' => $form->createView()]);
    }
    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("/supprimerAide/{id}" , name="supprimerAide")
     */
    public function SupprimerAide($id)
    {
        $Aidefind = $this->getDoctrine()->getRepository(Aide::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($Aidefind);
        $em->flush();
        return $this->redirectToRoute('AfficherAide');

    }
    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("/modifierAide/{id}" , name="modifierAide")
     */
    public function modifierAide($id, Request $request)
    {
        $Aidefind = $this->getDoctrine()->getRepository(Aide::class)->findBy(['id' => $id])[0];
        $form = $this->createForm(AideType::class, $Aidefind);
        $form->add('modifier', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
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
            $Aidefind->setLienImage($newFilename);
            }
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('AfficherAide');
        }
        return $this->render('aide/modifierAide.html.twig', ['formModifierAide' => $form->createView()]);

    }
    /**
     * @Route("/admin/upload/test", name="upload_test")
     */
    public function temporaryUploadAction(Request $request)
    {
        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $request->files->get('image');
        $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
        dd($uploadedFile->move(
            $destination,
            $newFilename
        ));
    }

}
