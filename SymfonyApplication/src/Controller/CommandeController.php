<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\User;
use App\Entity\ProduitService;
use App\Form\CommandeType;
use App\Entity\ProdutiCommande;
use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AffectationcommandeType;
use Symfony\Component\Mime\Email;
/**
 * @Route("/commande")
 */
class CommandeController extends AbstractController
{
    /**
     * @Route("/", name="commande_index", methods={"GET"})
     */
    public function index(CommandeRepository $commandeRepository,SessionInterface $session): Response
    {   $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }else if($user->getType()!="admin")
        {   return $this->redirectToRoute('user_inscription');
        }
        return $this->render('commande/index.html.twig', [
            'commandes' => $commandeRepository->findAll(),
        ]);
    }
    /**
     * @Route("/commande_user/", name="commande_front")
     */
    public function afficherfront(SessionInterface  $session): Response
    {   $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }
        $user=$this->getDoctrine()->getRepository(User::class)->find($session->get('user')->getId());
        $listcommande=$this->getDoctrine()->getRepository(Commande::class)->findBy(['user'=>$user]);
        return $this->render('commande/indexfront.html.twig',['commandes'=>$listcommande,'user'=>$user,'path'=>$session->get('path'),'texte'=>$session->get('texte')]);

    }

    /**
     * @Route("/new/", name="commande_new", methods={"GET","POST"})
     */
    public function new(Request $request,SessionInterface $session): Response
    {  $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }
        $user=$this->getDoctrine()->getRepository(User::class)->find($session->get('user')->getId());
       $commande = new Commande();
       $commande->setUser($user);
       $commande->setPrix($session->get('PanierTotal'));
       $form = $this->createForm(CommandeType::class, $commande);
       $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commande);
            $entityManager->flush();
            $commandsaved=$this->getDoctrine()->getRepository(Commande::class)->find($commande->getId());
            $PanierItems=$session->get('PanierItems');
            foreach ($PanierItems as $item){
                $produitservice=$this->getDoctrine()->getRepository(ProduitService::class)->find($item['ProduitService']->getId());
                $produit_commande= new ProdutiCommande();
                $produit_commande->setProduitservice($produitservice);
                $produit_commande->setCommande($commandsaved);
                $produit_commande->setQuantite($item['quantity']);
                $entityManager->persist($produit_commande);
                $entityManager->flush();
             }

             /* clear panier */
            $session->set('panier',[]) ;
            $session->set('PanierTotal',0);
            $session->set('PanierItems',[]);
            /* fin clear panier */

            return $this->redirectToRoute('commande_front');
        }

        return $this->render('commande/new.html.twig', [

            'commande' => $commande,
            'form' => $form->createView(),
            'user'=>$user,
            'path'=>$session->get('path'),
            'texte'=>$session->get('texte'),
            'items'=>$session->get('PanierItems'),
            ]);
    }

    /**
     * @Route("/{id}", name="commande_show", methods={"GET"})
     */
    public function show(Commande $commande,SessionInterface $session): Response
    {   $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }else if($user->getType()!="admin")
        {   return $this->redirectToRoute('user_inscription');
        }
        $listproduit=$this->getDoctrine()->getRepository(ProdutiCommande::class)->findBy(['Commande'=>$commande->getId()]);

    return $this->render('commande/show.html.twig', [
            'commande' => $commande,
            'ProduitService'=>$listproduit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="commande_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Commande $commande,SessionInterface $session): Response
    {   $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }else if($user->getType()!="admin")
        {   return $this->redirectToRoute('user_inscription');
        }
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commande_index');
        }

        return $this->render('commande/edit.html.twig', [
            'commande' => $commande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="commande_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Commande $commande): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commande->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commande);
            $entityManager->flush();}

        return $this->redirectToRoute('commande_index');
    }

    /**
     * @Route("/affecter/{id}", name="commande_affectation")
     */
    public function affectation(Request $request, $id, MailerInterface $mailer,SessionInterface $session): Response
    { $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }else if($user->getType()!="admin")
        {   return $this->redirectToRoute('user_inscription');
        }
        $commande=new Commande();
        $commande=$this->getDoctrine()->getRepository(Commande::class)->find($id);
        $form=$this->createForm(AffectationcommandeType::class);
        $form->handleRequest($request);
        if($form->isSubmitted())
        {
            $livraison=$form->get('Livraison')->getData();
            $commande->setLivraison($livraison);

            $this->getDoctrine()->getManager()->flush();
            $usermail=$commande->getUser()->getMail();
            $message="votre commande est En cours de livraison";

            $email=(new Email())
                ->from('holidayhiatuspidev@gmail.com')
                ->to($usermail)
                ->subject('Confirmation de commande  ')
            ->html($this->renderView('/commande/mailcommande.html.twig',['commande'=>$commande,'message'=>$message]), 'text/html');
            $mailer->send($email);
            return $this->redirectToRoute('commande_index');


        }
        return $this->render('livraison/affectation_from.html.twig',['form'=>$form->createView(),'commande'=>$commande]);

    }
}
