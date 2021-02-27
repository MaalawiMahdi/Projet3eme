<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ConnexionUserType;
use App\Form\UserType;
use App\Repository\UserRepository;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{



    /**
     * @Route("/user/index", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/admin.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/HolidayHiatus", name="user_inscription", methods={"GET","POST"})
     */
    public function new(Request $request,UserRepository $userRepository): Response
    {
        $user = new User();
        $useronline=new User();
        $user->setType("client");
        $connexion = $this->createForm(ConnexionUserType::class,$useronline);
        $connexion=$connexion->add('Se connecter',SubmitType::class);
        $form = $this->createForm(UserType::class, $user);
        $form=$form->add("S'inscrire",SubmitType::class);
        $form->handleRequest($request);
        $connexion->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('user_inscription');
        }else if($connexion->isSubmitted()&& $connexion->isValid()){
            $verifuser=$userRepository->findOneBy(array('mail'=>$useronline->getMail(),'password'=>$useronline->getPassword()));
            if(is_null($verifuser)){
                return $this->render('user/message.html.twig');
            }
            else {
                if($verifuser->getType()=="client") {
                    return $this->redirectToRoute('user_profil', ['id' => $verifuser->getId()]);
                }
                elseif ($verifuser->getType()=="admin"){
                   return $this->redirectToRoute('user_index');
                }
            }
        }

        return $this->render('user/accueil.html.twig', [
            'form' => $form->createView(),
            'connexion'=>$connexion->createView(),
        ]);
    }

    /**
     * @Route("HolidayHiatus/profil/{id}", name="user_profil", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }
}
