<?php

namespace App\Controller;

use App\Form\AideType;
use App\Form\SearchAidesType;
use mysql_xdevapi\Exception;
use PhpParser\Node\Scalar\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Aide;
use App\Form\TriformType;
use App\Entity\Captcha;
use App\Form\CaptchaType;
use App\Form\NoteType;
use App\Entity\Note;
use App\Entity\User;

use Dompdf\Dompdf;
use Dompdf\Options;

use Symfony\Component\HttpFoundation\File\UploadedFile;



class AideController extends AbstractController
{
    public $rand=1;
    /**
     * @Route("/aide", name="aide")
     */
    public function index(): Response
    {
        return $this->render('aide/index.html.twig', [
            'controller_name' => 'AideController',
        ]);
    }

    /**
     * @param Request $request
     * @param Request $requests
     * @return Response
     * @Route("/AfficherAide", name="AfficherAide")
     */
    public function listAide(Request $request,SessionInterface $session): Response
    {if(is_null($session->get('user'))||$session->get('user')->getType()!="admin"){
        return $this->redirectToRoute('user_inscription');
    }
        $Aide = $this->getDoctrine()->getRepository(Aide::class)->findAll();
        $Aidetri = $this->getDoctrine()->getRepository(Aide::class)->findAlltri();
        $formtri=$this->createForm(TriformType::class);
        $formtri->handleRequest($request);
        $form=$this->createForm(SearchAidesType::class);
        $form->handleRequest($request);




        if ($form->isSubmitted())
        {
            $data=$form->getData();
            $titre=$data['recherche'];
            $searchAidesfind=$this->getDoctrine()->getRepository(Aide::class)->search($titre);
            /*$searchAidesfindtri=$this->getDoctrine()->getRepository(Aide::class)->searchtri($titre);
            if ($formtri->isSubmitted()) {

                return $this->render('aide/listAide.html.twig', ['listAide' => $searchAidesfindtri,'formSearch'=>$form->createView(),
                    'formtri' => $formtri->createView(),]);
            }*/
            return $this->render('aide/listAide.html.twig', ['listAide' => $searchAidesfind,'formSearch'=>$form->createView(),
                'formtri' => $formtri->createView(),]);

        }
        else if ($formtri->isSubmitted()) {

            return $this->render('aide/listAide.html.twig', ['listAide' => $Aidetri,'formSearch'=>$form->createView(),
                'formtri' => $formtri->createView(),]);
        }
        return $this->render('aide/listAide.html.twig', ['listAide' => $Aide,'formSearch'=>$form->createView(),
            'formtri' => $formtri->createView(),]);
    }

    /**
     * @param $iduser
     * @param $id
     * @param Request $request
     * @return Response
     * @Route ("/Afficherdetailaide/{id}/{iduser}",name="Afficherdetailaide")
     */
    public function detailAide($iduser,$id,Request $request,SessionInterface $session): Response
    {   if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }else if($session->get('user')->getId()!=$iduser){
        return $this->redirectToRoute('Afficherdetailaide',['iduser'=>$session->get('user')->getId() ,  'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);
    }

        $Aidefind = $this->getDoctrine()->getRepository(Aide::class)->find($id);
        $x=random_int(1,21);
        $Captcha = $this->getDoctrine()->getRepository(Captcha::class)->find($x);
        $formCaptcha= $this->createForm(CaptchaType::class);
        $formCaptcha->add('id', HiddenType::class,['data' =>$x]);
        $formCaptcha->handleRequest($request);

        if ($formCaptcha->isSubmitted()) {
            $data=$formCaptcha->getData();
            $findCaptcha=$this->getDoctrine()->getRepository(Captcha::class)->find($data['id']);
            $verif=$data['Captcha'];
            if($findCaptcha->getValue()==$verif)
            {
                return $this->redirectToRoute('Afficherdetailaidenote',['DetailAides' => $Aidefind,'iduser'=>$iduser,'id'=>$id,   'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);}
        }
        $x=random_int(1,21);
        $Captcha = $this->getDoctrine()->getRepository(Captcha::class)->find($x);
        $formCaptcha= $this->createForm(CaptchaType::class);
        $formCaptcha->add('id', HiddenType::class,['data' =>$x]);
        return $this->render('aide/DetailAides.html.twig', ['DetailAides' => $Aidefind,'iduser'=>$iduser,'captcha'=>$Captcha,'formCaptcha' =>$formCaptcha->createView() ,  'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);


    }

    /**
     * @param $iduser
     * @param $id
     * @param Request $request
     * @return Response
     * @Route ("/Afficherdetailaidenote/{id}/{iduser}",name="Afficherdetailaidenote")
     */
    public function detailAidenote($iduser,$id,Request $request,SessionInterface $session): Response
    {   if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }else if($session->get('user')->getId()!=$iduser){
        return $this->redirectToRoute('Afficherdetailaidenote',['iduser'=>$session->get('user')->getId() ,  'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);
    }
        $note=0;
        $aviss="";
        $Aidefind = $this->getDoctrine()->getRepository(Aide::class)->find($id);

        $Notes=$this->getDoctrine()->getRepository(Note::class)->findBy(array('aide'=>$id));
        $x = $this->getDoctrine()->getRepository(Note::class)->findOneBy(array('aide'=>$Aidefind,'user'=>$iduser));
        $total=0;
        $Moyenne=0;
        if (!(empty($Notes))){
        for ($i =0; $i <= (count($Notes)-1); $i++)
        {
            $total=$total+($Notes[$i]->getValeur());
        }
        $Moyenne=$total/(count($Notes));}
        if(!(empty($x)))
        {
            $note=$x->getValeur();
            $aviss=$x->getAvis();
        }
            return $this->render('aide/DetailAidesnote.html.twig', ['DetailAides' => $Aidefind,'iduser'=>$iduser,'moyenne'=>$Moyenne,'note'=>$note,'aviss'=>$aviss, 'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);



    }

    /**
     * @Route ("/impression/{id}/{iduser}",name="impression")
     */
    public function impression($iduser,$id,SessionInterface $session)
    {   if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }else if($session->get('user')->getId()!=$iduser){
        return $this->redirectToRoute('impression',['iduser'=>$session->get('user')->getId() ,  'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);
    }
        $Aidefind = $this->getDoctrine()->getRepository(Aide::class)->find($id);

        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('aide/mypdf.html.twig', [
            'title' => "Welcome to our PDF Test",'aide'=>$Aidefind,
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => false
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/AfficherAides/{id}/{iduser}", name="AfficherAides")
     */
    public function listAides($iduser,$id,Request $request,SessionInterface $session): Response
    {   if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }else if($session->get('user')->getId()!=$iduser){
        return $this->redirectToRoute('impression',['iduser'=>$session->get('user')->getId() ,  'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);
    }
        $Aidefind = $this->getDoctrine()->getRepository(Aide::class)->findBy(array('categorie'=>$id));

        $categorieid=$Aidefind[0]->getCategorie();
        $form=$this->createForm(SearchAidesType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            $data=$form->getData();
            $titre=$data['recherche'];
            $searchAidesfind=$this->getDoctrine()->getRepository(Aide::class)->searchs($titre,$categorieid);
            return $this->render('aide/listAides.html.twig', ['listAides' => $searchAidesfind,'iduser'=>$iduser,'formSearch'=>$form->createView(),'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);

        }
        return $this->render('aide/listAides.html.twig', ['listAides' => $Aidefind,'iduser'=>$iduser,'formSearch'=>$form->createView(),'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);

    }
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     * @Route ("/ajouterAide" , name="ajouterAide")
     */
    public function ajouterAide(Request $request,SessionInterface $session)
    {   if(is_null($session->get('user'))||$session->get('user')->getType()!="admin"){
        return $this->redirectToRoute('user_inscription');
    }
        $Aide = new Aide();
        $form = $this->createForm(AideType::class, $Aide);
        $form->add('ajouter', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['imageFile']->getData();
            if ($uploadedFile)
            {
                $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $Aide->setLienImage($newFilename);
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($Aide);
            $em->flush();
            return $this->redirectToRoute('AfficherAide');

        }
        return $this->render('aide/ajouterAide.html.twig', ['formAjouterAide' => $form->createView()]);
    }
    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("/supprimerAide/{id}" , name="supprimerAide")
     */
    public function SupprimerAide($id,SessionInterface $session)
    {  if(is_null($session->get('user'))||$session->get('user')->getType()!="admin"){
        return $this->redirectToRoute('user_inscription');
    }
        $Aidefind = $this->getDoctrine()->getRepository(Aide::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($Aidefind);
        $em->flush();
        return $this->redirectToRoute('AfficherAide');

    }
    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route ("/modifierAide/{id}" , name="modifierAide")
     */
    public function modifierAide($id, Request $request,SessionInterface $session)
    {  if(is_null($session->get('user'))||$session->get('user')->getType()!="admin"){
        return $this->redirectToRoute('user_inscription');
    }
        $Aidefind = $this->getDoctrine()->getRepository(Aide::class)->findBy(['id' => $id])[0];
        $form = $this->createForm(AideType::class, $Aidefind);
        $form->add('modifier', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['imageFile']->getData();
            if ($uploadedFile)
            {
            $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $destination,
                $newFilename
            );
            $Aidefind->setLienImage($newFilename);
            }
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('AfficherAide');
        }
        return $this->render('aide/modifierAide.html.twig', ['formModifierAide' => $form->createView()]);

    }
    /**
     * @Route("/admin/upload/test", name="upload_test")
     */
    public function temporaryUploadAction(Request $request,SessionInterface $session)
    {
        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $request->files->get('image');
        $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
        dd($uploadedFile->move(
            $destination,
            $newFilename
        ));
    }

    /**
     * @param Request $request
     * @return mixed
     * @Route ("/captcha", name="captcha")
     */
    public function captcha(Request $request,SessionInterface $session)
    {  if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }
        $x=random_int(1,21);
        $Captcha = $this->getDoctrine()->getRepository(Captcha::class)->find($x);
        $formCaptcha= $this->createForm(CaptchaType::class);
        $formCaptcha->add('id', HiddenType::class,['data' =>$x]);
        $formCaptcha->handleRequest($request);

        if ($formCaptcha->isSubmitted()) {
            $data=$formCaptcha->getData();
            $findCaptcha=$this->getDoctrine()->getRepository(Captcha::class)->find($data['id']);
            $verif=$data['Captcha'];
            if($findCaptcha->getValue()==$verif)
            {return $this->redirectToRoute('admin');}
        }
        $x=random_int(1,21);
        $Captcha = $this->getDoctrine()->getRepository(Captcha::class)->find($x);
        $formCaptcha= $this->createForm(CaptchaType::class);
        $formCaptcha->add('id', HiddenType::class,['data' =>$x]);

        return $this->render('aide/Captcha.html.twig', ['captcha'=>$Captcha,'formCaptcha' =>$formCaptcha->createView(),'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);
    }

    /**
     * @return Response
     * @Route ("/AfficherStatAide", name="AfficherStatAide")
     */

    public function AfficherStatAide(SessionInterface $session)
    {     if(is_null($session->get('user'))||$session->get('user')->getType()!="admin"){
        return $this->redirectToRoute('user_inscription');
    }

        $Aide = $this->getDoctrine()->getRepository(Aide::class)->findAll();
         $Aides = [];
        $Moyennes = [];
        for ($j =0; $j <= (count($Aide)-1); $j++)
        {
            $Notes=$this->getDoctrine()->getRepository(Note::class)->findBy(array('aide'=>$Aide[$j]));
            $Aides [$j] = $Aide[$j]->getTitre();
            $total=0;
            $Moyenne=0;
            if (!(empty($Notes)))
            {
                for ($i =0; $i <= (count($Notes)-1); $i++)
                {
                    $total=$total+($Notes[$i]->getValeur());
                }
                $Moyenne=$total/(count($Notes));
            }
            $Moyennes[] = $Moyenne;

        }
        return $this->render('aide/statsAides.html.twig', [
            'aides' => $Aides,
            'moyennes' => $Moyennes
        ]);
    }
    /**
     * @Route("/videoAide/{id}", name="videoAide")
     */
    public function videoAide($id,SessionInterface $session): Response
    {  if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }
        $Aidefind = $this->getDoctrine()->getRepository(Aide::class)->find($id);
        return $this->render('aide/videoaide.html.twig', [
            'aidefind' => $Aidefind,'path'=>$session->get('path'),'texte'=>$session->get('texte'),
        ]);
    }




}
