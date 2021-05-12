<?php

namespace App\Controller;

use App\Entity\InformationsSupplementaires;
use App\Entity\User;
use App\Form\ConnexionUserType;
use App\Form\PasswordbackupType;
use App\Form\PasswordkeyType;
use App\Form\UploadimageType;
use App\Form\UserType;
use App\Form\InfoSuppType;
use App\Repository\UserRepository;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Button;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;


class UserController extends AbstractController
{

    /**
     * @Route("/Api/User/AfficherUsers", name="AfficherUsersMobile")
     */
    public function AfficherUsersMobile(): Response
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        $jsonContent= Array();
        foreach ($users as $key=>$user){
            $jsonContent[$key]['id']= $user->getId();
            $jsonContent[$key]['password']= $user->getPassword();
            $jsonContent[$key]['type']= $user->getType();
            $jsonContent[$key]['mail']= $user->getMail();
            $jsonContent[$key]['active']= $user->getActive();
            $jsonContent[$key]['ban']= $user->getBan();

        }
        return new JsonResponse($jsonContent);
    }

    /**
     * @Route("/Api/User/AddUserMobile/{mail}/{password}", name="AddUsersMobile")
     */
    public function AddUserMobile($mail,$password)
    {   $user = new User();
        $user->setMail($mail);
        $user->setPassword(password_hash ($password,PASSWORD_BCRYPT,['cost' => 12]));
        $user->setType("client");
        $user->setActive(true);
        $user->setBan(false);
        $info = new InformationsSupplementaires();
        $info->setUser($user);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->persist($info);
        $em->flush();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response;
    }
    /**
     * @Route("/Api/User/ConnexionUserMobile/{mail}/{password}", name="ConnexionUsersMobile")
     */
    public function Connexion($mail,$password)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(["mail"=>$mail]);
        if(password_verify($password,$user->getPassword())==false){
            $response = new JsonResponse(['resultat'=>"falsePassword"]);
            return $response;
        }else if($user->getBan()) {
            $response = new JsonResponse(['resultat'=>"banned"]);
            return $response;
        }else{
            $response = new JsonResponse(['resultat'=>"true"]);
            return $response;
        }
    }
    /**
     * @Route("/Api/User/ProfilUserMobile/{id}", name="ProfilUserMobile")
     */
    public function ProfilMobile($id)
    {
        $user=$this->getDoctrine()->getRepository(User::class)->find($id);
        $info= $user->getInformationsSupplementaires();

        // $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(["mail"=>$mail]);
        if(is_null($info->getNom())){
            $info->setNom("");
        }
        if(is_null($info->getPrenom())){
            $info->setPrenom("");
        }

        if(is_null($info->getTell())){
            $info->setTell("");
        }

        if(is_null($info->getImage())){
            $info->setImage("");
        }
        $response = new JsonResponse(['id'=>$info->getId(),
            'user_id'=>$info->getUser()->getId(),
            'nom'=>$info->getNom(),
            'prenom'=>$info->getPrenom(),
            'tell'=>$info->getTell(),
            'image'=>$info->getImage(),

        ]);

        return $response;

    }

    /**
     * @Route("/Api/User/UpdateUserMobile/{id}/{mail}/{password}", name="UpdateUserMobile")
     */
    public function UpdateUserMobile($id,$mail,$password)
    {   $user = $this->getDoctrine()->getRepository(User::class)->find($id);
        $user->setMail($mail);
        $user->setPassword(password_hash ($password,PASSWORD_BCRYPT,['cost' => 12]));
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response;
    }
    /**
     * @Route("/Api/User/UpdateProfilMobile/{id}/{nom}/{prenom}/{tell}", name="UpdateProfilMobile")
     */
    public function UpdateProfilMobile($id,$nom,$prenom,$tell)
    {  $user=$this->getDoctrine()->getRepository(User::class)->find($id);
        $information_supp= $user->getInformationsSupplementaires();
        $information_supp->setNom($nom);
        $information_supp->setPrenom($prenom);
        $information_supp->setTell($tell);
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response;
    }

    /**
     * @Route("/Api/User/AddUserMobileByFacebbok/{mail}/{password}/{nom}/{prenom}", name="AddUserMobileByFacebbok")
     */
    public function AddUserMobileByFacebbok(Request $request,$mail,$password,$nom,$prenom)
    {   $user = new User();
        $user->setMail($mail);
        $user->setPassword(password_hash ($password,PASSWORD_BCRYPT,['cost' => 12]));
        $user->setType("client");
        $user->setActive(true);
        $user->setBan(false);
        $info = new InformationsSupplementaires();
        $info->setUser($user);
        $info->setNom($nom);
        $info->setPrenom($prenom);
        $info->setImage($request->query->get('linkimage'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->persist($info);
        $em->flush();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response;
    }
    /**
     * @Route("/Api/User/ConnexionUserMobileViaFacebook/{mail}", name="ConnexionUserMobileViaFacebook")
     */
    public function ConnexionViaFacebook($mail)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(["mail"=>$mail]);
        if($user->getBan()) {
            $response = new JsonResponse(['resultat'=>"banned"]);
            return $response;
        }else{
            $response = new JsonResponse(['resultat'=>"true"]);
            return $response;
        }
    }

    /**
     * @Route("/user/deconnexion", name="deconnecter", methods={"GET"})
     */
    public function logout(SessionInterface $session): Response
    {
        $session->clear();
        return $this->redirectToRoute('user_inscription');
    }
    /**
     * @Route("/user/index/{filtre}/{filtrevalue}", name="user_filtre", methods={"GET"})
     */
    public function filtre(UserRepository $userRepository,SessionInterface $session,$filtre,$filtrevalue): Response
    {   $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }else if($user->getType()!="admin")
        {   return $this->redirectToRoute('user_inscription');
        }
        $users=$userRepository->findBy([$filtre=>$filtrevalue]);
        $template = $this->render('user/ajaxtable.html.twig',['users'=>$users])->getContent();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response->setData(['template' => $template ]);
    }
    /**
     * @Route("/user/index/non_filtre", name="user_nonfiltre", methods={"GET"})
     */
    public function non_filtre(UserRepository $userRepository,SessionInterface $session): Response
    {   $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }else if($user->getType()!="admin")
        {   return $this->redirectToRoute('user_inscription');
        }
        $users=$userRepository->findAll();
        $template = $this->render('user/ajaxtable.html.twig',['users'=>$users])->getContent();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response->setData(['template' => $template ]);
    }

    /**
     * @Route("/user/index", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository,SessionInterface $session): Response
    {   $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }else if($user->getType()!="admin")
        {   return $this->redirectToRoute('user_inscription');
        }

        return $this->render('user/admin.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/HolidayHiatus", name="user_inscription", methods={"GET","POST"})
     */
        public function new(Request $request,UserRepository $userRepository,SessionInterface $session): Response
    {
      if(!(is_null($session->get('googleuser')))){
       $user= new User();
       $gooleuser=$session->get('googleuser');
       $user->setMail($gooleuser->getEmail());
       $information_supp=new InformationsSupplementaires();
       $information_supp->setUser($user);
       $information_supp->setNom($gooleuser->getName());
      $information_supp->setPrenom($gooleuser->getLastName());
      }else{
        $user = new User();
        $information_supp=new InformationsSupplementaires();
        $information_supp->setUser($user);
      }
        $useronline=new User();
        $user->setType("client");
        $user->setActive(true);
        $connexion = $this->createForm(ConnexionUserType::class,$useronline);
        $connexion=$connexion->add('Se connecter',SubmitType::class);
        $form = $this->createForm(UserType::class, $user);
        $form=$form->add("S'inscrire",SubmitType::class);
        $form->handleRequest($request);
        $connexion->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $verifuser=$userRepository->findOneBy(array('mail'=>$user->getMail()));
            if(is_null($verifuser)) {
                $user->setPassword(password_hash ($user->getPassword(),PASSWORD_BCRYPT,['cost' => 12]));
                $entityManager = $this->getDoctrine()->getManager();
                $user->setBan(false);
                $entityManager->persist($user);
                $entityManager->persist($information_supp);
                $entityManager->flush();
                $session->clear();

                return $this->redirectToRoute('user_inscription');

            }else {
                $session->clear();

                return $this->render('user/message.html.twig',['message'=>"Ce mail existe déjà"]);
            }

        }else if($connexion->isSubmitted() && $connexion->isValid()) {
            $verifuser = $userRepository->findOneBy(array('mail' => $useronline->getMail()));
            if (is_null($verifuser)||password_verify($useronline->getPassword(),$verifuser->getPassword())==false) {
                return $this->render('user/message.html.twig', ['message' => 'Email ou mot de passe incorrect']);
            } else if ($verifuser->getBan()) {
                return $this->render('user/message.html.twig', ['message' => 'Vous avez été banni ']);

            } else {
                if ($verifuser->getType() == "client" || $verifuser->getType() == "societe") {
                    $session->set('user', $verifuser);
                    $session->set('panier',[]) ;
                    return $this->redirectToRoute('user_online');
                } elseif ($verifuser->getType() == "admin") {

                    $session->set('user', $verifuser);
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
     * @Route("HolidayHiatus/acceuil/", name="user_online", methods={"GET"})
     */
    public function show(SessionInterface $session): Response
    {   $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }$texte="DÉMARRER AVEC UN COMPTE BUSINESS";
        $path="/societe";
        if($user->getType()=="societe"){
        if(is_null($user->getSociete()->getBoard())){
            $texte="Créér votre board";
            $path="/AjouterBoard";
        }else{
            $texte="Gérer votre board";
            $path="/AfficherSujet/";
            $path=$path.$session->get('user')->getSociete()->getBoard()->getId();
        }
        }
        $session->set('path',$path);
        $session->set('texte',$texte);
        return $this->render('user/accueilonline.html.twig', [
           'path'=>$session->get('path'),'texte'=>$session->get('texte'),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form=$form->add("Enregister",SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT,['cost' => 12]));
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
    /**
     * @Route("/user/profil", name="profil",)
     */
    public function profil(SessionInterface $session,Request $request): Response
    {  $user=new User();

        $user=$session->get('user');
        if(is_null($user)){
            return $this->redirectToRoute('user_inscription');

        }
        $information_supp= $this->getDoctrine()->getRepository(InformationsSupplementaires::class)
            ->find($user->getInformationsSupplementaires()->getId());
    $form_image=$this->createForm(UploadimageType::class);
    $form_image->add('save image',SubmitType::class);
    $form_image->handleRequest($request);
    if($form_image->isSubmitted()){
        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $form_image['image']->getData();
        $destination = $this->getParameter('kernel.project_dir').'/public/profil';
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();

        if($uploadedFile){$uploadedFile->move(
            $destination,
            $newFilename
        );
        $information_supp->setImage($newFilename);
        $this->getDoctrine()->getManager()->flush();
        }}
          return $this->render('user/profil.html.twig',['user'=>$user,'path'=>$session->get('path'),
                   'texte'=>$session->get('texte'),'info_supp'=>$information_supp,'formup'=>$form_image->createView()]);

        }
    /**
     * @Route("/user/profil/edit", name="editprofil" )
     */
    public function editprofil(Request $request,SessionInterface $session): Response
    {
        $user=$session->get('user');

        $information_supp= $this->getDoctrine()->getRepository(InformationsSupplementaires::class)
            ->find($user->getInformationsSupplementaires()->getId());
        $forminfo=$this->createForm(InfoSuppType::class,$information_supp);
        $formuser=$this->createForm(UserType::class,$user);
        $formuser->add('save',SubmitType::class);
        $forminfo->add('saveinformation',SubmitType::class);
        $formuser->handleRequest($request);
        $forminfo->handleRequest($request);

        if($formuser->isSubmitted()&&$formuser->isValid()){
           $user->setPassword(password_hash ($user->getPassword(), PASSWORD_BCRYPT, ['cost' => 12]));
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('profil');
        }elseif($forminfo->isSubmitted()&&$forminfo->isValid()){
            $xm=$this->getDoctrine()->getManager();
            $xm->flush();
            return $this->redirectToRoute('profil');
        }

        return $this->render('user/profilfrontedit.html.twig',['user'=>$user,'path'=>$session->get('path'),
            'texte'=>$session->get('texte'),'info_supp'=>$information_supp,'userform'=>$formuser->createView(),
        'info_supp_form'=>$forminfo->createView(),
        ]);
    }
    /**
     * @Route("/user/Desactiver", name="Desactiver", methods={"GET"})
     */
    public function Desactiver(SessionInterface $session): Response
    {  $user=$this->getDoctrine()->getRepository(User::class)->find($session->get('user')->getId());
       $user->setActive(false);
       $this->getDoctrine()->getManager()->flush();
        $session->clear();
        return $this->render('user/message.html.twig',['message'=>"votre compte est désactivé"]);
    }
    /**
     * @Route("/user/ban/{iduser}", name="ban",)
     */
    public function ban($iduser): Response
    {
        $user=$this->getDoctrine()->getRepository(User::class)->find($iduser);
        $user->setBan(true);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('user_index');
    }
    /**
     * @Route("/user/restaurer/{iduser}", name="ban_remove",)
     */
    public function restaurer($iduser): Response
    {
        $user=$this->getDoctrine()->getRepository(User::class)->find($iduser);
        $user->setBan(false);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('user_index');
    }

    /**
     * @Route("/user/mailsender", name="mailersender",)
     */
    public function mailsender(MailerInterface $mailer): Response
    {
        $email=(new Email())
            ->from('mehdi.maalawi@esprit.tn')
            ->to('mehdi.maalawi@gmail.com')
            ->subject('send')
            ->text('mahdi');
        $mailer->send($email);
        return $this->redirectToRoute('user_inscription');

    }

    /**
     * @Route("/user/password_backup", name="user_password_backup",)
     */
    public function passwordbackup(MailerInterface $mailer,Request $request,SessionInterface $session): Response
    {

        $form = $this->createForm(PasswordbackupType::class);
        $form->add('Envoyer',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted()){
           $email=$form->get('email')->getData();
           $user=$this->getDoctrine()->getRepository(User::class)->findOneBy(['mail'=>$email]);
           if(is_null($user)){
               $this->addFlash('message','Cette adresse e-mail est inconnue');
           }else{
               $cle =(bin2hex(random_bytes(3)));
               $session->set('cle',$cle);
               $session->set('userbackup',$user);
               $email=(new Email())
                   ->from('holidayhiat-security@gmail.com')
                   ->to($user->getMail())
                   ->subject('code de verification')
                   ->text($cle);
               $mailer->send($email);
               $this->addFlash('message','un code de vérification vous vous être envoyé pour confirmer votre identité ');
              return $this->redirectToRoute('user_password_backup_key');

           }
        }
      return $this->render('user/passwordbackup.html.twig',['passwordform'=>$form->createView()]);
    }

    /**
     * @Route("/user/password_backup/key", name="user_password_backup_key",)
     */
    public function passwordbackupkey(MailerInterface $mailer,Request $request,SessionInterface $session): Response
    {
        if(is_null($session->get('cle'))||is_null($session->get('userbackup'))){
           return $this->redirectToRoute("user_password_backup");
        }
        $paswwordkey=$this->createForm(PasswordkeyType::class);
        $paswwordkey->add('Envoyer',SubmitType::class);
        $paswwordkey->handleRequest($request);
        if($paswwordkey->isSubmitted()){
         $secret_key=$session->get('cle');
         $key=$paswwordkey->get('cle')->getData();
         if($secret_key==$key){
             $this->addFlash('message','Changer votre mot de passe ');
            return $this->redirectToRoute('usereditpassword');
         }else{
             $this->addFlash('message','code de verification non valid');
         }
        }
        return  $this->render('user/passwordbackup.html.twig',['keyform'=>$paswwordkey->createView()]);

    }
    /**
     * @Route("/user/editpassword", name="usereditpassword",)
     */
    public function editpassword(Request $request,SessionInterface $session): Response
    {
        if(is_null($session->get('cle'))||is_null($session->get('userbackup'))){
            return $this->redirectToRoute("user_password_backup");
        }
        $user=new User();
        $user=$this->getDoctrine()->getRepository(User::class)->find($session->get('userbackup')->getId());
        $user->setPassword('');
        $passwordform=$this->createForm(UserType::class,$user);
        $passwordform->add('Envoyer',SubmitType::class);
        $passwordform->handleRequest($request);
        if($passwordform->isSubmitted()){
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT, ['cost' => 12]));
            $this->getDoctrine()->getManager()->flush();
            $session->clear();
            return $this->redirectToRoute('user_inscription');

        }
        return  $this->render('user/passwordbackup.html.twig',['passwordbackupform'=>$passwordform->createView()]);

    }


}
