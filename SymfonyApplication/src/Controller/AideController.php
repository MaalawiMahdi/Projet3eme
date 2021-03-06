<?php

namespace App\Controller;

use App\Form\AideType;
use App\Form\SearchAidesType;
use mysql_xdevapi\Exception;
use PhpParser\Node\Scalar\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Aide;
use App\Form\TriformType;
use App\Entity\Captcha;
use App\Form\CaptchaType;

use Symfony\Component\HttpFoundation\File\UploadedFile;



class AideController extends AbstractController
{
    public $rand=1;
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
     * @param Request $request
     * @param Request $requests
     * @return Response
     * @Route("/AfficherAide", name="AfficherAide")
     */
    public function listAide(Request $request): Response
    {
        $Aide = $this->getDoctrine()->getRepository(Aide::class)->findAll();
        $Aidetri = $this->getDoctrine()->getRepository(Aide::class)->findAlltri();
        $formtri=$this->createForm(TriformType::class);
        $formtri->handleRequest($request);
        $form=$this->createForm(SearchAidesType::class);
        $form->handleRequest($request);




        if ($form->isSubmitted())
        {
            $data=$form->getData();
            $titre=$data['recherche'];
            $searchAidesfind=$this->getDoctrine()->getRepository(Aide::class)->search($titre);
            /*$searchAidesfindtri=$this->getDoctrine()->getRepository(Aide::class)->searchtri($titre);
            if ($formtri->isSubmitted()) {

                return $this->render('aide/listAide.html.twig', ['listAide' => $searchAidesfindtri,'formSearch'=>$form->createView(),
                    'formtri' => $formtri->createView(),]);
            }*/
            return $this->render('aide/listAide.html.twig', ['listAide' => $searchAidesfind,'formSearch'=>$form->createView(),
                'formtri' => $formtri->createView(),]);

        }
        else if ($formtri->isSubmitted()) {

            return $this->render('aide/listAide.html.twig', ['listAide' => $Aidetri,'formSearch'=>$form->createView(),
                'formtri' => $formtri->createView(),]);
        }
        return $this->render('aide/listAide.html.twig', ['listAide' => $Aide,'formSearch'=>$form->createView(),
            'formtri' => $formtri->createView(),]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/AfficherAides/{id}/{iduser}", name="AfficherAides")
     */
    public function listAides($iduser,$id,Request $request): Response
    {   $Aidefind = $this->getDoctrine()->getRepository(Aide::class)->findBy(array('categorie'=>$id));

        $categorieid=$Aidefind[0]->getCategorie();
        $form=$this->createForm(SearchAidesType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            $data=$form->getData();
            $titre=$data['recherche'];
            $searchAidesfind=$this->getDoctrine()->getRepository(Aide::class)->searchs($titre,$categorieid);
            return $this->render('aide/listAides.html.twig', ['listAides' => $searchAidesfind,'iduser'=>$iduser,'formSearch'=>$form->createView(),]);

        }
        return $this->render('aide/listAides.html.twig', ['listAides' => $Aidefind,'iduser'=>$iduser,'formSearch'=>$form->createView(),]);

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

    /**
     * @param Request $request
     * @return mixed
     * @Route ("/captcha", name="captcha")
     */
    public function captcha(Request $request)
    {
        $x=random_int(1,21);
        $Captcha = $this->getDoctrine()->getRepository(Captcha::class)->find($x);
        $formCaptcha= $this->createForm(CaptchaType::class);
        $formCaptcha->add('id', HiddenType::class,['data' =>$x]);
        $formCaptcha->handleRequest($request);

        if ($formCaptcha->isSubmitted()) {
            $data=$formCaptcha->getData();
            $findCaptcha=$this->getDoctrine()->getRepository(Captcha::class)->find($data['id']);
            $verif=$data['Captcha'];
            if($findCaptcha->getValue()==$verif)
            {return $this->redirectToRoute('admin');}
        }
        $x=random_int(1,21);
        $Captcha = $this->getDoctrine()->getRepository(Captcha::class)->find($x);
        $formCaptcha= $this->createForm(CaptchaType::class);
        $formCaptcha->add('id', HiddenType::class,['data' =>$x]);

        return $this->render('aide/Captcha.html.twig', ['captcha'=>$Captcha,'formCaptcha' =>$formCaptcha->createView()]);
    }



}
