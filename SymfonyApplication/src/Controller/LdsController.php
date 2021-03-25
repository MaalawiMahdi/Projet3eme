<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Ld;
use App\Entity\User;
use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LdsController extends AbstractController
{
    /**
     * @Route("/lds", name="lds")
     */
    public function index(): Response
    {
        return $this->render('lds/index.html.twig', [
            'controller_name' => 'LdsController',
        ]);
    }

    /**
     * @Route("/AddLike/{idboard}/{id}/{idcom}/{iduser}", name="addLike")
     */
    public function addLike($idboard,$id,$idcom,$iduser)
    {
        $c = $this->getDoctrine()->getRepository(Commentaire::class)->find($idcom);
        $u = $this->getDoctrine()->getRepository(User::class)->find($iduser);
        $x = $this->getDoctrine()->getRepository(Ld::class)->findOneBy(array('Commentaire'=>$c,'User'=>$u,'value'=>'dislike'));
        $em = $this->getDoctrine()->getManager();
        if (empty($x))
        {
            $l = new Ld();
            $l->setCommentaire($c);
            $l->setUser($u);
            $l->setValue('like');
            $em->persist($l);
            $em->flush();
        }
        else
        {
            $em->remove($x);
            $l = new Ld();
            $l->setCommentaire($c);
            $l->setUser($u);
            $l->setValue('like');
            $em->persist($l);
            $em->flush();
        }
        return $this->redirectToRoute('ConsulterSujetFront',['idboard'=>$idboard,'id'=>$id]);
    }
    /**
     * @Route("/DeleteLike/{idboard}/{id}/{idcom}/{iduser}", name="DeleteLike")
     */
     public function DeleteLike($idboard,$id,$idcom,$iduser)
     {
         $c = $this->getDoctrine()->getRepository(Commentaire::class)->find($idcom);
         $u = $this->getDoctrine()->getRepository(User::class)->find($iduser);
         $l = $this->getDoctrine()->getRepository(Ld::class)->findOneBy(array('Commentaire'=>$c,'User'=>$u,'value'=>'like'));
         $em = $this->getDoctrine()->getManager();
         $em->remove($l);
         $em->flush();
         return $this->redirectToRoute('ConsulterSujetFront',['idboard'=>$idboard,'id'=>$id]);
     }
    /**
     * @Route("/AddDislike/{idboard}/{id}/{idcom}/{iduser}", name="addDislike")
     */
    public function addDislike($idboard,$id,$idcom,$iduser)
    {
        $c = $this->getDoctrine()->getRepository(Commentaire::class)->find($idcom);
        $u = $this->getDoctrine()->getRepository(User::class)->find($iduser);
        $x = $this->getDoctrine()->getRepository(Ld::class)->findOneBy(array('Commentaire'=>$c,'User'=>$u,'value'=>'like'));
        $em = $this->getDoctrine()->getManager();
        if (empty($x))
        {
            $l = new Ld();
            $l->setCommentaire($c);
            $l->setUser($u);
            $l->setValue('dislike');
            $em->persist($l);
            $em->flush();
        }
        else
        {
            $em->remove($x);
            $l = new Ld();
            $l->setCommentaire($c);
            $l->setUser($u);
            $l->setValue('dislike');
            $em->persist($l);
            $em->flush();
        }
        return $this->redirectToRoute('ConsulterSujetFront',['idboard'=>$idboard,'id'=>$id]);
    }

    /**
     * @Route("/DeleteDislike/{idboard}/{id}/{idcom}/{iduser}", name="DeleteDislike")
     */
    public function DeleteDislike($idboard,$id,$idcom,$iduser)
    {
        $c = $this->getDoctrine()->getRepository(Commentaire::class)->find($idcom);
        $u = $this->getDoctrine()->getRepository(User::class)->find($iduser);
        $l = $this->getDoctrine()->getRepository(Ld::class)->findOneBy(array('Commentaire'=>$c,'User'=>$u,'value'=>'dislike'));
        $em = $this->getDoctrine()->getManager();
        $em->remove($l);
        $em->flush();
        return $this->redirectToRoute('ConsulterSujetFront',['idboard'=>$idboard,'id'=>$id]);
    }
}
