<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use App\Entity\Board;
use App\Entity\CategorieBoard;
use App\Form\BoardType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BoardController extends AbstractController
{
    /**
     * @Route("/board", name="board")
     */
    public function index(): Response
    {
        return $this->render('board/index.html.twig', [
            'controller_name' => 'BoardController',
        ]);
    }
    /**
     * @Route("/AfficherBoard", name="list")
     */
    public function list()
    {
        $listcategorie=$this->getDoctrine()->getRepository(Board::class)->findAll();


        return $this->render('categorie/AfficherBoard.html.twig', [
            'list'=>$listcategorie,
        ]);
    }


}
