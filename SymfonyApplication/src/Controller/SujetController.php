<?php

namespace App\Controller;

use App\Entity\Board;
use App\Entity\Commentaire;
use App\Entity\Notesujet;
use App\Entity\Sujet;
use App\Entity\User;
use App\Form\CommentaireType;
use App\Form\RechercheSujetType;
use App\Form\RechercheType;
use App\Form\SearchSujetType;
use App\Form\SujetType;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use Ob\HighchartsBundle\Highcharts\Highchart;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\String_;
use phpDocumentor\Reflection\Types\True_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Files;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
class SujetController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(): Response
    {
        return $this->render('main.html.twig', [
            'controller_name' => 'SujetController',
        ]);
    }

    /**
     * @Route("/AfficherSujet/{idboard}", name="AfficherSujet")
     */
    public function afficher($idboard): Response
    {
        $list = $this->getDoctrine()->getRepository(Sujet::class)->findBy(array('board' => $idboard));
        return $this->render('sujet/affichersujet.html.twig',['list'=>$list, 'board_id'=>$idboard]);
    }

    /**
     * @Route("/ImprimerSujets/{idboard}", name="ImprimerSujets")
     */
    public function ImprimerS($idboard): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        $list = $this->getDoctrine()->getRepository(Sujet::class)->findBy(array('board' => $idboard));

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('sujet/pdfsujets.html.twig',['list'=>$list, 'board_id'=>$idboard]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("lesSujets.pdf", [
            "Attachment" => true
        ]);
    }


    /**
     * @Route("/AjouterSujet/{idboard}", name="AjouterSujet")
     */
    public function AjouterSujet(Request $request,$idboard)
    {
        $Sujet = new Sujet();
        $board = $this->getDoctrine()->getRepository(Board::class)->find($idboard);
        $Sujet->setBoard($board);
        $form= $this->createForm(SujetType::class,$Sujet);
        $form->add('Ajouter',SubmitType::class);
        $em = $this->getDoctrine()->getManager();
        $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid())
            {
                $file = $Sujet->getLienImage();
                if ($file)
                {
                    $fileLink = md5(uniqid()).'.'.$file->guessExtension();
                    $file->move($this->getParameter('upload_directory'),$fileLink);
                    $Sujet->setLienImage($fileLink);
                    $em->persist($Sujet);
                    $em->flush();
                }
                else
                {
                    $em->persist($Sujet);
                    $em->flush();
                }
                return $this->redirectToRoute('AfficherSujet',['idboard'=> $idboard,]);
            }
        return $this->render('sujet/ajoutersujet.html.twig', [
            'form' => $form->createView(),'board_id'=>$idboard
        ]);
    }
    /**
     * @Route("/SupprimerSujet/{idboard}/{id}", name="SupprimerSujet")
     */
    public function SupprimerSujet($idboard,$id)
    {
        $sujet = $this->getDoctrine()->getRepository( Sujet::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($sujet);
        $em->flush();
        return $this->redirectToRoute('AfficherSujet',['idboard'=> $idboard,]);
    }
    /**
     * @Route("/ModifierSujet/{idboard}/{id}", name="ModifierSujet")
     */
    public function ModifiererSujet(Request $request,$idboard,$id)
    {
        $sujet = $this->getDoctrine()->getRepository( Sujet::class)->find($id);
        $form = $this->createForm(SujetType::class,$sujet);
        $form->add('Modifier', SubmitType::class);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if ($form->isSubmitted()&&$form->isValid())
        {

            $file = $form['lien_image']->getData();
            if($file)
            {
                $fileLink = md5(uniqid()).'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_directory'),$fileLink);
                $sujet->setLienImage($fileLink);
                $em=$this->getDoctrine()->getManager();
                $em->flush();
            }
            else
            {
                $em->flush();
            }
            return $this->redirectToRoute('AfficherSujet',['idboard'=>$idboard]);

        }
        return $this->render('sujet/modifiersujet.html.twig', ['form'=>$form->createView(),'board_id'=>$idboard, 'sujet'=>$sujet]);
    }

   /**
     * @Route("/ConsulterSujet/{idboard}/{id}", name="ConsulterSujet")
     */
    public function ConsulterSujet(Request $request,$id,$idboard)
    {
        $sujet=$this->getDoctrine()->getRepository(Sujet::class)->find($id);
        $comm = $this->getDoctrine()->getRepository(Commentaire::class)->findAll();
        return $this->render('sujet/consultersujet.html.twig',['sujet'=>$sujet, 'board_id'=>$idboard,'commentaires'=>$comm]);
    }


    /**
     * @Route("/AfficherSujetFront/{idboard}", name="AfficherSujetFront")
     */
    public function afficherFront($idboard,Request $request, PaginatorInterface $paginator): Response
    {
        $sujets = $this->getDoctrine()->getRepository(Sujet::class)->findBy(array('board' => $idboard));
        $list = $paginator->paginate(
            $sujets,
            $request->query->getInt('page',1),
            4
        );
        return $this->render('sujet/frontaffichersujet.html.twig',['list'=>$list, 'board_id'=>$idboard]);
    }
    /**
     * @Route("/ConsulterSujetFront/{idboard}/{id}", name="ConsulterSujetFront")
     */
    public function ConsulterSujetFront(Request $request,$idboard,$id,SessionInterface $session)
    {
        $e = "";
        $sujet=$this->getDoctrine()->getRepository(Sujet::class)->find($id);
        $user=$this->getDoctrine()->getRepository(User::class)->find(2);
        $session->set('user',$user);
        $comm = new Commentaire();
        $comm->setSujet($sujet);
        $comm->setUser($user);
        $f = $this->createForm(CommentaireType::class,$comm);
        $f->add('Commenter', SubmitType::class);
        $f->handleRequest($request);
        if ($f->isSubmitted()&&$f->isValid())
        {
            $c = $comm->getCom();
            if (str_contains($c, 'religion') || str_contains($c, 'politique')) {
                $e = '1';
            }
            else
            {
                $em=$this->getDoctrine()->getManager();
                $em->persist($comm);
                $em->flush();
                return $this->redirectToRoute('ConsulterSujetFront',['idboard'=>$idboard,'id'=>$id]);
            }

        }
        $listc=$this->getDoctrine()->getRepository(Commentaire::class)->findAll();
        return $this->render('sujet/consultersujetfront.html.twig',['e'=>$e,'sujet'=>$sujet, 'board_id'=>$idboard, 'f'=>$f->createView(),'listc'=>$listc, 'user'=>$user]);
    }

    /**
     * @Route("/AjouterNote/{idsujet}/{iduser}/{v}", name="AjouterNoteSujet")
     */
    public function AjouterNoteSujet($idsujet,$iduser,$v)
    {
        $s = $this->getDoctrine()->getRepository(Sujet::class)->find($idsujet);
        $u = $this->getDoctrine()->getRepository(User::class)->find($iduser);
        if($s->RatedBy($u))
        {
            $em = $this->getDoctrine()->getManager();

            $r = $this->getDoctrine()->getRepository(Notesujet::class)->findOneBy(array('sujet'=>$s,'user'=>$u));
            $r ->setValue($v);
            $em->flush();
            return $this->json(['moyenne'=>$s->NoteSujetMoyenne(),'note'=>$v],200);
        }
        else
        {
            $em = $this->getDoctrine()->getManager();
            $note = new Notesujet();
            $note->setUser($u);
            $note->setSujet($s);
            $note->setValue($v);
            $em->persist($note);
            $em->flush();
            return $this->json(['moyenne'=>$s->NoteSujetMoyenne(),'note'=>$v],200);
        }

    }

    /**
     * @Route("/Stats/{idboard}", name="Stats")
     */
    public function Stats($idboard)
    {
        $x = $this->getDoctrine()->getRepository(Sujet::class)->findBy(['board'=>$idboard]);
        $ob = new Highchart();
        $ob->chart->renderTo('linechart');
        $ob->title->text('Statistique des sujets');
        $ob->plotOptions->pie(array(
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => array('enabled' => true),
            'showInLegend' => true
        ));

        $matrice =array() ;
        for ($i =0; $i <sizeof($x);$i++) {
            array_push($matrice,array($x[$i]->getTitre(),$x[$i]->NoteSujetMoyenne()) );
        }
        $data =$matrice;
        $series = array(
            array('type' => 'pie', 'name' =>'Note Moyenne', 'data' => $data)
        );
        $ob->series($series);
        return $this->render('sujet/statistics.html.twig', ['chart' => $ob]);
    }
}