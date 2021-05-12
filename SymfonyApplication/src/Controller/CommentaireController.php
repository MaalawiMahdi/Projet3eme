<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Ld;
use App\Entity\Sujet;
use App\Entity\User;
use App\Form\CommentaireType;
use http\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class CommentaireController extends AbstractController
{
    /**
     * @Route("/Api/Commentaire/AfficherCommentaireMobile/{idsujet}", name="AfficherCommentaireMobile")
     */
    public function afficherCmntMobile($idsujet): Response
    {
        $commentaire = $this->getDoctrine()->getRepository(Commentaire::class)->findBy(array('sujet' => $idsujet));
        $jsonContent= Array();
        foreach ($commentaire as $key=>$cmnt){
            $jsonContent[$key]['id']= $cmnt->getId();
            $jsonContent[$key]['user_id']= $cmnt->getUser()->getId();
            $jsonContent[$key]['user_mail']= $cmnt->getUser()->getMail();
            $jsonContent[$key]['sujet_id']= $cmnt->getSujet()->getId();
            $jsonContent[$key]['com']= $cmnt->getCom();
        }
        return new JsonResponse($jsonContent);
    }

    /**
     * @Route("/Api/Commentaire/addCommentaireMobile/{idsujet}/{iduser}/{com}", name="addCommentaireMobile")
     */
    public function addCmntMobile($idsujet,$iduser,$com): Response
    {
        $cmn = new Commentaire();
        $em = $this->getDoctrine()->getManager();
        $suj = $this->getDoctrine()->getRepository(Sujet::class)->find($idsujet);
        $user = $this->getDoctrine()->getRepository(User::class)->find($iduser);
        $cmn->setSujet($suj);
        $cmn->setUser($user);
        $cmn->setCom($com);
        $em->persist($cmn);
        $em->flush();
        return new JsonResponse([],200);
    }

    /**
     * @Route("/Api/Commentaire/deleteCommentaireMobile/{idc}", name="deleteCommentaireMobile")
     */
    public function deleteCmntMobile($idc): Response
    {
        $c = $this->getDoctrine()->getRepository(Commentaire::class)->find($idc);
        $em = $this->getDoctrine()->getManager();
        $em->remove($c);
        $em->flush();
        return new JsonResponse([],200);
    }

    /**
     * @Route("/Api/Commentaire/updateCommentaireMobile/{idc}/{com}", name="updateCommentaireMobile")
     */
    public function updateCmntMobile($idc,$com): Response
    {
        $c = $this->getDoctrine()->getRepository(Commentaire::class)->find($idc);
        $c->setCom($com);
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        return new JsonResponse([],200);
    }
    /**
     * @Route("/commentaire", name="commentaire")
     */
    public function index(): Response
    {
        return $this->render('commentaire/index.html.twig', [
            'controller_name' => 'CommentaireController',
        ]);
    }
    /**
     * @Route("/SupprimerCommentaire/{idboard}/{id}/{idcom}", name="SupprimerCommentaire")
     */
    public function SupprimerCommentaire($idboard,$id,$idcom,SessionInterface $session)
    { if(is_null($session->get('user'))||$session->get('user')->getType()=="admin"){
        return $this->redirectToRoute('user_inscription');
    }
        $comm = $this->getDoctrine()->getRepository( Commentaire::class)->find($idcom);
        $user = $this->getDoctrine()->getRepository( User::class)->find($session->get('user')->getId());
        if ($comm->getUser()===$user)
        {
            $em=$this->getDoctrine()->getManager();
            $em->remove($comm);
            $em->flush();
            return $this->redirectToRoute('ConsulterSujetFront',['idboard'=>$idboard,'id'=>$id, 'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);
        }
        else
        {
            return $this->redirectToRoute('ConsulterSujetFront',['idboard'=>$idboard,'id'=>$id, 'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);

        }

    }
    /**
     * @Route("/ModifierCommentaire/{idboard}/{id}/{idcom}", name="ModifierCommentaire")
     */
    public function ModifierCommentaire(Request $request,$idboard,$id,$idcom,SessionInterface $session)
    {   if(is_null($session->get('user'))||$session->get('user')->getType()=="admin"){
        return $this->redirectToRoute('user_inscription');
        }

        $e = "";
        $sujet=$this->getDoctrine()->getRepository(Sujet::class)->find($id);
        $comm = $this->getDoctrine()->getRepository( Commentaire::class)->find($idcom);
        $user = $this->getDoctrine()->getRepository( User::class)->find($session->get('user')->getId());
        $f = $this->createForm(CommentaireType::class,$comm);
        $f->add('Valider', SubmitType::class);
        $f->handleRequest($request);
        if($f->isSubmitted()&&$f->isValid())
        {
            $c = $comm->getCom();
            if (str_contains($c, 'religion') || str_contains($c, 'politique')) {
                $e = '1';
            }
            else
            {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                return $this->redirectToRoute('ConsulterSujetFront',['idboard'=>$idboard,'id'=>$id, 'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);
            }
        }
        $listc=$this->getDoctrine()->getRepository(Commentaire::class)->findAll();
        return $this->render('sujet/modifiercommentairefront.html.twig',['e'=>$e,'sujet'=>$sujet, 'board_id'=>$idboard, 'f'=>$f->createView(),'listc'=>$listc, 'user'=>$user,'idcom'=>$idcom, 'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);

    }
    /**
     * @Route("/Like/{idcom}/{iduser}", name="Like")
     */
    public function Like($idcom,$iduser,SessionInterface $session) : Response
    { if(is_null($session->get('user'))||$session->get('user')->getType()=="admin"){
        return $this->redirectToRoute('user_inscription');
      }else if($session->get('user')->getId()!=$iduser){
        return $this->redirectToRoute('Like',['idcom'=>$idcom,'iduser'=>$session->get('user')->getId()]);
        }
        $em = $this->getDoctrine()->getManager();
        $commentaire = $this->getDoctrine()->getRepository(Commentaire::class)->find($idcom);
        $u = $this->getDoctrine()->getRepository(User::class)->find($iduser);
        if ($commentaire->isLikedBy($u))
        {
            $x = $this->getDoctrine()->getRepository(Ld::class)->findOneBy(array('Commentaire'=>$commentaire,'User'=>$u,'value'=>'like'));
            $em ->remove($x);
            $em ->flush();
            return $this->json([
                'code'=>200,
                'likes'=>$this->getDoctrine()->getRepository(Ld::class)->count(['Commentaire'=>$commentaire,'value'=>'like']),
                'dislikes'=>$this->getDoctrine()->getRepository(Ld::class)->count(['Commentaire'=>$commentaire,'value'=>'dislike']),
                'idcom'=>$idcom
            ],200);
        }
        elseif ($commentaire->isDisLikedBy($u))
        {
            $x = $this->getDoctrine()->getRepository(Ld::class)->findOneBy(array('Commentaire'=>$commentaire,'User'=>$u,'value'=>'dislike'));
            $x->setValue('like');
            $em ->flush();
            return $this->json([
                'code'=>200,
                'likes' => $this->getDoctrine()->getRepository(Ld::class)->count(['Commentaire'=>$commentaire,'value'=>'like']),
                'dislikes'=>$this->getDoctrine()->getRepository(Ld::class)->count(['Commentaire'=>$commentaire,'value'=>'dislike']),
                'idcom'=>$idcom , 'path'=>$session->get('path'),'texte'=>$session->get('texte'),
            ],200);
        }
        $l = new Ld();
        $l->setValue('like');
        $l->setUser($u);
        $l->setCommentaire($commentaire);
        $em->persist($l);
        $em->flush();
        return $this->json([
                'code' => 200,
                'likes' => $this->getDoctrine()->getRepository(Ld::class)->count(['Commentaire'=>$commentaire,'value'=>'like']),
                'dislikes'=>$this->getDoctrine()->getRepository(Ld::class)->count(['Commentaire'=>$commentaire,'value'=>'dislike']),
            'idcom'=>$idcom, 'path'=>$session->get('path'),'texte'=>$session->get('texte'),
        ],200);

    }
    /**
     * @Route("/Dislike/{idcom}/{iduser}", name="Dislike")
     */
    public function Dislike($idcom,$iduser,SessionInterface $session) : Response
    {if(is_null($session->get('user'))||$session->get('user')->getType()=="admin"){
        return $this->redirectToRoute('user_inscription');
    }else if($session->get('user')->getId()!=$iduser){
        return $this->redirectToRoute('Dislike',['idcom'=>$idcom,'iduser'=>$session->get('user')->getId()]);

    }
        $em = $this->getDoctrine()->getManager();
        $commentaire = $this->getDoctrine()->getRepository(Commentaire::class)->find($idcom);
        $u = $this->getDoctrine()->getRepository(User::class)->find($iduser);
        if ($commentaire->isDislikedBy($u))
        {
            $x = $this->getDoctrine()->getRepository(Ld::class)->findOneBy(array('Commentaire'=>$commentaire,'User'=>$u,'value'=>'dislike'));
            $em ->remove($x);
            $em ->flush();
            return $this->json([
                'code'=>200,
                'dislikes'=>$this->getDoctrine()->getRepository(Ld::class)->count(['Commentaire'=>$commentaire,'value'=>'dislike']),
                'likes'=>$this->getDoctrine()->getRepository(Ld::class)->count(['Commentaire'=>$commentaire,'value'=>'like']),
                'idcom'=>$idcom , 'path'=>$session->get('path'),'texte'=>$session->get('texte'),

            ],200);
        }
        elseif ($commentaire->isLikedBy($u))
        {
            $x = $this->getDoctrine()->getRepository(Ld::class)->findOneBy(array('Commentaire'=>$commentaire,'User'=>$u,'value'=>'like'));
            $x->setValue('dislike');
            $em ->flush();
            return $this->json([
                'code'=>200,
                'dislikes' => $this->getDoctrine()->getRepository(Ld::class)->count(['Commentaire'=>$commentaire,'value'=>'dislike']),
                'likes'=>$this->getDoctrine()->getRepository(Ld::class)->count(['Commentaire'=>$commentaire,'value'=>'like']),
                'idcom'=>$idcom , 'path'=>$session->get('path'),'texte'=>$session->get('texte'),
            ],200);
        }
        $l = new Ld();
        $l->setValue('dislike');
        $l->setUser($u);
        $l->setCommentaire($commentaire);
        $em->persist($l);
        $em->flush();
        return $this->json([
            'code' => 200,
            'dislikes' => $this->getDoctrine()->getRepository(Ld::class)->count(['Commentaire'=>$commentaire,'value'=>'dislike']),
            'likes'=>$this->getDoctrine()->getRepository(Ld::class)->count(['Commentaire'=>$commentaire,'value'=>'like']),
            'idcom'=>$idcom , 'path'=>$session->get('path'),'texte'=>$session->get('texte'),
        ],200);

    }

}
