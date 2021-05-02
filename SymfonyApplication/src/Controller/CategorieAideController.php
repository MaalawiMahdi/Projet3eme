<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\CategorieAide;
use App\Form\CategorieAideType;

use App\Form\SearchCategorieAidesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Knp\Component\Pager\PaginatorInterface;

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
     * @Route("Api/CategorieAide/Afficher", name="AfficherCategorieAideApi")
     */
    public function listCategoriesAideJson(Request $request): Response
    {$categoriesAide = $this->getDoctrine()->getRepository(CategorieAide::class)->findAll();
        $jsonContent= Array();
        foreach ($categoriesAide as $key=>$Cat){
            $jsonContent[$key]['id']= $Cat->getId();
            $jsonContent[$key]['titre']= $Cat->getTitre();
            $jsonContent[$key]['lien_icon']=$Cat->getLienIcon();


        }
          return new JsonResponse($jsonContent);
        }
    /**
     * @param Request $request
     * @return Response
     * @Route("/AfficherCategorieAide", name="AfficherCategorieAide")
     */
    public function listCategoriesAide(Request $request,SessionInterface $session): Response
    { if(is_null($session->get('user'))||$session->get('user')->getType()!="admin"){
        return $this->redirectToRoute('user_inscription');
    }

        $user=$session->get('user');
     $iduser=$user->getId();


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
     * @Route("/AfficherCategorieAides", name="AfficherCategorieAides")
     */
    public function listCategoriesAides(Request $request,SessionInterface $session,PaginatorInterface $paginator): Response
    {  if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }
        $user=$session->get('user');
        $iduser=$user->getId();
        $donnees = $this->getDoctrine()->getRepository(CategorieAide::class)->findAll();
        $form=$this->createForm(SearchCategorieAidesType::class);
        $form->handleRequest($request);
        $categoriesAide = $paginator->paginate($donnees,$request->query->getInt('page', 1),2);

        if ($form->isSubmitted())
        {
            $data=$form->getData();
            $titre=$data['recherche'];
            $donnee=$this->getDoctrine()->getRepository(CategorieAide::class)->search($titre);
            $categoriesAidefind = $paginator->paginate($donnee,$request->query->getInt('page', 1),2);
            return $this->render('categorie_aide/listCategoriesAides.html.twig', ['listCategorieAides' => $categoriesAidefind,'iduser'=>$iduser,'formSearch'=>$form->createView(),'path'=>$session->get('path'),'texte'=>$session->get('texte'),
            ]);

        }
        return $this->render('categorie_aide/listCategoriesAides.html.twig', ['listCategorieAides' => $categoriesAide,'iduser'=>$iduser,'formSearch'=>$form->createView(),'path'=>$session->get('path'),'texte'=>$session->get('texte'),
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route ("/ajouterCategorieAide" , name="ajouterCategorieAide")
     */
    public function ajouterCategorieAide(Request $request,SessionInterface $session)
    {if(is_null($session->get('user'))||$session->get('user')->getType()!="admin"){
        return $this->redirectToRoute('user_inscription');
    }
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
    public function SupprimerCategorieAide($id,SessionInterface $session)
    {if(is_null($session->get('user'))||$session->get('user')->getType()!="admin"){
        return $this->redirectToRoute('user_inscription');
    }
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
    public function modifierCategorieAide($id, Request $request,SessionInterface $session)
    {if(is_null($session->get('user'))||$session->get('user')->getType()!="admin"){
        return $this->redirectToRoute('user_inscription');
    }
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

    /**
     * @return mixed
     * @Route ("/AfficherStatCatAide", name="AfficherStatCatAide")
     */
    public function AfficherStatAide(SessionInterface $session)
    {if(is_null($session->get('user'))||$session->get('user')->getType()!="admin"){
        return $this->redirectToRoute('user_inscription');
    }

        $CategorieAide = $this->getDoctrine()->getRepository(CategorieAide::class)->findAll();
        $Aides = [];
        $CatAides = [];
        $total=0;
        for ($j =0; $j <= (count($CategorieAide)-1); $j++)
        {   $total=$total+count( $CategorieAide[$j]->getAides());
        }
        for ($j =0; $j <= (count($CategorieAide)-1); $j++)
        {   $Aides[$j]=count( $CategorieAide[$j]->getAides());
            $AidePourcentage=round(($Aides[$j]*100)/$total,2);

            $CatAides [$j] = $CategorieAide[$j]->getTitre()." ".$AidePourcentage."%";

        }

        return $this->render('categorie_aide/StatsCategorieAide.html.twig', [
            'aides' => $Aides,
            'catAides' => $CatAides,
        ]);
    }

}
