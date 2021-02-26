<?php

namespace App\Controller;
use App\Entity\CategorieBoard;
use App\Entity\Student;
use App\Form\CategorieBoardType;
use App\Form\StudentType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie")
     */
    public function index(): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }

    /**
     * @Route("/AfficherCategorie", name="list")
     */
    public function list()
    {
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();


        return $this->render('categorie/AfficherCategorie.html.twig', [
            'list'=>$listcategorie,
        ]);
    }
    /**
     * @Route("/AfficherCategorieAdmin", name="listAdmin")
     */
    public function listAdmin()
    {
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();


        return $this->render('categorie/AfficherCategorieAdmin.html.twig', [
            'list'=>$listcategorie,
        ]);
    }

    /**
     * @Route("/AjouterCategorie", name="AjouterCategorie")
     */
    public function AjouterCategorie(Request $request)
    {
        $CategorieBoard =new CategorieBoard();
        $form= $this->createForm(CategorieBoardType::class,$CategorieBoard);
        $form->add('ajouter',SubmitType::class,['label'=>'AjouterCategorie']);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($CategorieBoard);
            $em->flush();
            return $this->redirectToRoute("list");
        }
        return $this->render('categorie/AjouterCategorie.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/updateC/{id}", name="update")
     */
    public function update(Request $request,$id)
    {
        $em = $this->getDoctrine()->getmanager();
        $CategorieBoard= $em->getRepository(CategorieBoard::class)->find($id);
        $form = $this->createForm(CategorieBoardType::class,$CategorieBoard);
        $form-> add('Update', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid())
        {
            $em->flush();
            return $this->redirectToRoute("listAdmin");
        }

        return $this->render('categorie/UpdateCategorieBoard.html.twig', [
            'form' => $form->createView()]);


    }

    /**
     * @Route("/deleteC/{id}", name="delete")
     */
    public function delete($id)
    {
        $em = $this->getDoctrine()->getmanager();
        $CategorieBoard= $em->getRepository(CategorieBoard::class)->find($id);
        $em->remove($CategorieBoard);
        $em->flush();
        return $this->redirectToRoute('listAdmin');

    }

}

