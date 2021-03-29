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

$panier = $session->get('panier',[]) ;

$panierwithData = [] ;

foreach ($panier as $id => $quantity){
    $panierwithData[] = [
        'ProduitService' => $ProduitService->find($id),
        'quantity' => $quantity
    ];
}

$total = 0;

foreach ($panierwithData as $item){
    $totalItem = $item['ProduitService']->getPrixUnitaire() * $item['quantity'] ;
    $total += $totalItem;
}


        return $this->render('Cart/index.html.twig',['items'=>$panierwithData, 'total'=>$total]);
    }
    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session){


         $panier = $session->get('panier', []) ;


        if(!empty($panier[$id])){
            $panier[$id]++;
        }else {
            $panier[$id]= 1 ;
        }


        $session->set('panier', $panier);

        dd($session->get('panier'));

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