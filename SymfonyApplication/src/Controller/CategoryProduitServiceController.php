<?php

namespace App\Controller;

use App\Form\CategoryPSType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\CategorieProduitService;
use App\Entity\Board;


class CategoryProduitServiceController extends AbstractController
{
    /**
     * @Route("/category/produit/service", name="category_produit_service")
     */
    public function index(SessionInterface $session): Response
    {  if(is_null($session->get('user')->getSociete()->getBoard()->getId())){
        $this->redirectToRoute('user_inscription');
    }
        $categories= $this->getDoctrine()->getManager()->getRepository(CategorieProduitService::class)->findAll();
        $board_id=$session->get('user')->getSociete()->getBoard()->getId();
        return $this->render('category_produit_service/index.html.twig', [
            'categories' => $categories,
            'path'=>$session->get('path'),
            'texte'=>$session->get('texte'),
            'board_id'=>$board_id,
        ]);
    }


    //Add Category
    /**
     * @Route("/category/produit/service/new", name="category_produit_service_add")
     */
    public function addCategoryAction(Request $request,SessionInterface $session)
    { if(is_null($session->get('user'))||$session->get('user')->getType()!="societe"){
        return $this->redirectToRoute('user_inscription');
    }
        $board=$this->getDoctrine()->getRepository(Board::class)->find($session->get('user')->getSociete()->getBoard()->getId());

        $category = new CategorieProduitService();
        $form = $this->createForm(CategoryPSType::class, $category);
        $category->setBoard($board);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $em= $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirect($this->generateUrl("category_produit_service"));
        }

        return $this->render('category_produit_service/addCategoryPS.html.twig',
            array(
                'Form'=>$form->createView(),
                'board_id'=>$board->getId(),
            ));
    }

    //Delete category
    /**
     * @Route("/category/produit/service/delete/{id}", name="category_produit_service_delete")
     */
    public function deleteAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $category = $em->getRepository(CategorieProduitService::class)->find($id);
        if ($category!==null)
        {
            $em->remove($category);
            $em->flush();
        }
        else
        {
            throw new NotFoundHttpException("La categorie d'id".$id."n'existe pas");
        }

        return $this->redirectToRoute("category_produit_service");
    }

    //Update Category
    /**
     * @Route("/category/produit/service/update/{id}", name="category_produit_service_update")
     */
    public function updateAction(Request $request, $id)
    {
        $em= $this->getDoctrine()->getManager();
        $category=$em->getRepository(CategorieProduitService::class)->find($id);

        $editform = $this->createForm(CategoryPSType::class, $category);
        $editform->handleRequest($request);

        if ($editform->isSubmitted() && $editform->isValid())
        {
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute("category_produit_service");
        }

        return $this->render('category_produit_service/updateCategoryPS.html.twig',
            array(
                'editForm'=>$editform->createView()
            ));
    }


}