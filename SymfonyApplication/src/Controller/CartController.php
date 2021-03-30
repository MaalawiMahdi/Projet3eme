<?php

namespace App\Controller;

use App\Form\ProduitServiceType;
use App\Repository\ProduitServiceRepository;
use Symfony\Component\Routing\Annotation\Route ;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\ProduitService;
use App\Entity\CategorieProduitService;



class CartController extends AbstractController
{
    /**
     * @Route("/produit/service/panier", name="produit_service_panier")
     */
    public function index(SessionInterface  $session,ProduitServiceRepository $ProduitService)
    {
if(is_null($session->get('user'))){
    $this->redirectToRoute('user_inscription');
}
$panier = $session->get('panier',[]) ;

$panierwithData = [] ;

foreach ($panier as $id => $quantity){
    $panierwithData[] = [
        'ProduitService' => $ProduitService->find($id),
        'quantity' => $quantity,

    ];
}

$total = 0;

foreach ($panierwithData as $item){
    $totalItem = $item['ProduitService']->getPrixUnitaire() * $item['quantity'] ;
    $total += $totalItem;
}
/* for no3men */
$session->set('PanierTotal',$total);
$session->set('PanierItems',$panierwithData);
        return $this->render('Cart/index.html.twig',['items'=>$panierwithData, 'total'=>$total,
            'user'=>$session->get('user'),
            'path'=>$session->get('path'),
            'texte'=>$session->get('texte'),]);
    }
    /**
     * @Route("/panier/add/{id}/{idboard}", name="cart_add")
     */
    public function add($id,$idboard, SessionInterface $session){


         $panier = $session->get('panier', []) ;


        if(!empty($panier[$id])){
            $panier[$id]++;
        }else {
            $panier[$id]= 1 ;
        }


        $session->set('panier', $panier);
        $produitajouter=$this->getDoctrine()->getRepository(ProduitService::class)->find($id);
       $this->addFlash($produitajouter->getTitre(),'Produit ajouté au panier ');
       return $this->redirectToRoute("produit_service_front",['idboard'=>$idboard]);

    }
    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session){
        $panier = $session->get('panier',[]) ;
        if(!empty($panier[$id])){
            unset($panier[$id]) ;
        }
        $session->set('panier',$panier);
        return $this->redirectToRoute("produit_service_panier") ;
    }
}