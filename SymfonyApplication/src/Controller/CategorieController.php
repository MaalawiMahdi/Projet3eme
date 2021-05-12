<?php

namespace App\Controller;
use App\Entity\CategorieBoard;
use App\Entity\Club2;
use App\Entity\Student;
use App\Form\CategorieBoardType;
use App\Form\StudentType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\JsonResponse;


class CategorieController extends AbstractController
{
    /**
     * @Route("/Api/CategorieBoard/AfficherCategorieMobile/", name="AfficherCategorieMobile")
     */
    public function afficherCategorieMobile(): Response
    {
        $Catboard = $this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();
        $jsonContent= Array();
        foreach ($Catboard as $key=>$CatBoard){
            $jsonContent[$key]['id']= $CatBoard->getId();
            $jsonContent[$key]['titre']= $CatBoard->getTitre();
            $jsonContent[$key]['lien_icon']= $CatBoard->getLienIcon();
        }
        return new JsonResponse($jsonContent);
    }
    /**
     * @Route("/Api/CategorieBoard/SupprimerCategorieMobile/{id}", name="SupprimerCategorieMobile")
     */
    public function SupprimerBoardMobile($id)
    {
        $em = $this->getDoctrine()->getmanager();
        $board= $em->getRepository(CategorieBoard::class)->find($id);
        $em->remove($board);
        $em->flush();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response;
    }
    /**
     * @Route("/Api/CategorieBoard/ModifierCategorieBoard/{titre}/{pic}/{id}", name="ModifierCategorieBoard")
     */
    public function ModifierCategorieBoard ($titre,$pic,$id)
    {
        $em = $this->getDoctrine()->getmanager();
        $board= $em->getRepository(CategorieBoard::class)->find($id);
        $board->setTitre($titre);
        $board->setLienIcon($pic);
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response;
    }

    /**
     * @Route("/categorie", name="categorie")
     */
    public function index(): Response
    {
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();

        return $this->render('temp1.html.twig', [
            'list'=>$listcategorie,
        ]);
    }
    /**
     * @Route("/AfficherCategorieClient", name="list")
     */
    public function listC(SessionInterface $session)
    {
        if(is_null($session->get('user'))){
            return $this->redirectToRoute('user_inscription');
        }
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();


        return $this->render('Bootstraptemplates/accueilonline.html.twig', [
            'list'=>$listcategorie,
        ]);
    }
    /**
     * @Route("/AfficherCategorie", name="list")
     */
    public function list(SessionInterface $session)
    {  if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();


        return $this->render('categorie/AfficherCategorie.html.twig', [
            'list'=>$listcategorie,
        ]);
    }
    /**
     * @Route("/AfficherCategorieAdmin", name="listAdmin")
     */
    public function listAdmin(SessionInterface $session)
    { if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();


        return $this->render('categorie/AfficherCategorieAdmin.html.twig', [
            'list'=>$listcategorie,
        ]);
    }

    /**
     * @Route("/AjouterCategorie", name="AjouterCategorie")
     */
    public function AjouterCategorie(Request $request,SessionInterface $session)
    {if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();
         $err="";
        $CategorieBoard =new CategorieBoard();
        $form= $this->createForm(CategorieBoardType::class,$CategorieBoard);
        $form->add('ajouter',SubmitType::class,['label'=>'AjouterCategorie']);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['lien_icon']->getData();
            if ($uploadedFile)
            {
                $destination = $this->getParameter('kernel.project_dir').'/public';
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $CategorieBoard->setLienIcon($newFilename);
            }
            $cat= $CategorieBoard->getTitre();
            if (str_contains($cat, 'religion') || str_contains($cat, 'politique')) {
                $err = '1';
            }
            else
            {
            $em=$this->getDoctrine()->getManager();
            $em->persist($CategorieBoard);
            $em->flush();
            return $this->redirectToRoute("list");
        }}
        return $this->render('categorie/AjouterCategorie.html.twig', [
            'err' => $err,
            'form' => $form->createView(),
            'list'=>$listcategorie,

        ]);

    }



    /**
     * @Route("/UpdateCategorie/{id}", name="update")
     */
    public function update(Request $request,$id,SessionInterface $session)
    {   if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();

        $em = $this->getDoctrine()->getmanager();
        $CategorieBoard= $em->getRepository(CategorieBoard::class)->find($id);
        $form = $this->createForm(CategorieBoardType::class,$CategorieBoard);
        $form-> add('Update', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['lien_icon']->getData();
            if ($uploadedFile)
            {
                $destination = $this->getParameter('kernel.project_dir').'/public';
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $CategorieBoard->setLienIcon($newFilename);
            }
            $em->flush();
            return $this->redirectToRoute("listAdmin");
        }

        return $this->render('categorie/UpdateCategorieBoard.html.twig', [
            'form' => $form->createView(),            'list'=>$listcategorie,
        ]);


    }

    /**
     * @Route("/DeleteCategorie/{id}", name="delete")
     */
    public function delete($id,SessionInterface $session)
    {   if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }

        $em = $this->getDoctrine()->getmanager();
        $CategorieBoard = $em->getRepository(CategorieBoard::class)->find($id);
        $em->remove($CategorieBoard);
        $em->flush();
        return $this->redirectToRoute('listAdmin');

    }


}

