<?php

namespace App\Controller;

use App\Entity\Board;
use App\Entity\Favoris;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class FavorisController extends AbstractController
{
    /**
     * @Route("/favoris", name="favoris")
     */
    public function index(): Response
    {
        return $this->render('favoris/index.html.twig', [
            'controller_name' => 'FavorisController',
        ]);
    }

    /**
     * @Route("/AjouterFavoris/{id_board}/{id_user}", name="AjouterFavoris")
     */
    public function Ajouter($id_board,$id_user,SessionInterface $session): Response
    {
        $em = $this->getDoctrine()->getManager();
        $board=$this->getDoctrine()->getRepository(Board::class)->find($id_board);
        $User=$this->getDoctrine()->getRepository(User::class)->find($id_user);
        if($board->Favorised($User))
        { $call=0;
            $f = $this->getDoctrine()->getRepository(Favoris::class)->findOneBy(array('board'=>$board,'User'=>$User));
            $em->remove($f);
            $em->flush();
            $session->set('user',$User);
       }
        else
        {
            $call=1;
        $Favoris = new Favoris();
        $Favoris->setUser($User);
        $Favoris->setBoard($board);
        $em->persist($Favoris);
        $em->flush();
        $session->set('user',$User);
        }
        /*return $this->redirectToRoute("listB",['iduser'=>$id_user]);*/
        return $this->json(['etat'=>$call],200);

    }

    /**
     * @Route("/SupprimerFavoris/{id_board}/{id_user}", name="SupprimerFavoris")
     */
    public function Supprimer($id_board,$id_user): Response
    {

        $board=$this->getDoctrine()->getRepository(Board::class)->find($id_board);
        $User=$this->getDoctrine()->getRepository(User::class)->find($id_user);
        $Favoris=$this->getDoctrine()->getRepository(Favoris::class)->findOneBy(['board'=>$board,'User'=>$User]);
        $em=$this->getDoctrine()->getManager();
        $em->remove($Favoris);
        $em->flush();
        return $this->redirectToRoute("listB",['iduser'=>$id_user]);

    }
}
