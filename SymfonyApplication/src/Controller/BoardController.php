<?php

namespace App\Controller;

use App\Entity\Societe;
use App\Entity\Student;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

use App\Entity\Board;
use App\Entity\CategorieBoard;
use App\Form\BoardType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
class BoardController extends AbstractController
{
    /**
     * @Route("/Api/Board/AjouterBoardMobile/{titre}/{catid}/{pic}/{societ_id}", name="AjouterBoardMobile")
     */
    public function AjouterBoardMobile($titre,$catid,$pic,$societ_id)
    {   $board = new Board();
        $board->setTitre($titre);
        $cat=$this->getDoctrine()->getRepository(CategorieBoard::class)->find($catid);
        $board->setCategorie($cat);
        $board->setPic($pic);
        $societe=$this->getDoctrine()->getRepository(Societe::class)->find($societ_id);
        $board->setSociete($societe);
        $em = $this->getDoctrine()->getManager();
        $em->persist($board);
        $em->flush();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response;
    }
    /**
     * @Route("/Api/Board/ModifierBoardMobile/{titre}/{catid}/{pic}/{id}", name="ModifierBoardMobile")
     */
    public function ModifierBoardMobile($titre,$catid,$pic,$id)
    {
        $em = $this->getDoctrine()->getmanager();
        $board= $em->getRepository(Board::class)->find($id);
        $board->setTitre($titre);
        $cat=$this->getDoctrine()->getRepository(CategorieBoard::class)->find($catid);
        $board->setCategorie($cat);
        $board->setPic($pic);
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response;
    }
    /**
     * @Route("/Api/Board/SupprimerBoardMobile/{id}", name="SupprimerBoardMobile")
     */
    public function SupprimerBoardMobile($id)
    {
        $em = $this->getDoctrine()->getmanager();
        $board= $em->getRepository(Board::class)->find($id);
        $em->remove($board);
        $em->flush();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response;
    }
    /**
     * @Route("/Api/Board/AfficherBoardMobile/{idCat}", name="AfficherBoardMobile")
     */
    public function afficherBoardMobile($idCat): Response
    {
        $board = $this->getDoctrine()->getRepository(Board::class)->findBy(array('categorie' => $idCat));
        $jsonContent= Array();
        foreach ($board as $key=>$board){
            $jsonContent[$key]['id']= $board->getId();
            $jsonContent[$key]['categorie_id']= $board->getId();
            $jsonContent[$key]['titre']= $board->getTitre();
            $jsonContent[$key]['pic']= $board->getPic();
            //$jsonContent[$key]['nbr_vue']= $board->getnb();
        }
        return new JsonResponse($jsonContent);
    }
    /**
     * @Route("/Api/Board/AfficherAllBoardsMobile/", name="AfficherAllBoardsMobile")
     */
    public function afficherAllBoardsMobile(): Response
    {
        $boards = $this->getDoctrine()->getRepository(Board::class)->findAll();
        $jsonContent= Array();
        foreach ($boards as $key=>$board){

                $jsonContent[$key]['id'] = $board->getId();
                $jsonContent[$key]['categorie_id'] = $board->getId();
            if(!is_null($board->getSociete())) {
                $jsonContent[$key]['societe_id'] = $board->getSociete()->getId();
            }else{
                $jsonContent[$key]['societe_id'] = 0;

            }
                $jsonContent[$key]['titre'] = $board->getTitre();
                $jsonContent[$key]['pic'] = $board->getPic();

        }

        return new JsonResponse($jsonContent);
    }
    /**
     * @Route("/board", name="board")
     */
    public function index(): Response
    {
        return $this->render('board/index.html.twig', [
            'controller_name' => 'BoardController',

        ]);
    }

    /**
     * @Route("/pdf", name="pdf")
     */
    public function pdf(): Response
    {

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();

        $listboard=$this->getDoctrine()->getRepository(Board::class)->findAll();

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('board/mypdf.html.twig', [
            'listB' => $listboard,
                'list'=>$listcategorie,
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (inline view)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
    }


    /**
     * @Route("/AfficherBoard", name="listB")
     */
    public function list(Request $request,PaginatorInterface $paginator,SessionInterface $session)
    {  if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();
        $listboard=$this->getDoctrine()->getRepository(Board::class)->findAll();
        $user=$this->getDoctrine()->getRepository(User::class)->find($session->get('user')->getId());
        $articles =$paginator->paginate(
            $listboard,
            $request->query->getInt('page',1),
            4
        );

        return $this->render('board/AfficherBoard.html.twig', [
            'listB'=>$articles,
            'list'=>$listcategorie,
            'user'=>$user,
            'path'=>$session->get('path'),'texte'=>$session->get('texte'),

        ]);
    }
    /**
     * @Route("/AfficherBoardAdmin2", name="listB2")
     */
    public function listAdmin2(SessionInterface $session)
    {    if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();

        $listboard=$this->getDoctrine()->getRepository(Board::class)->findAll();


        return $this->render('board/AfficherBoardAdmin2.html.twig', [
            'listB'=>$listboard,
            'list'=>$listcategorie,

        ]);
    }
    /**
     * @return Response
     * @Route("/AfficherBoardAvance/{categorie_id}/{id_user}", name="AfficherBoardAvance")
     */
    public function BoardFind($categorie_id,$id_user,SessionInterface $session): Response
    {    if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
       }else if($session->get('user')->getId()!=$id_user){
        return $this->redirectToRoute('AfficherBoardAvance',['id_user'=>$session->get('user')->getId()]);
    }
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();
        $user=$this->getDoctrine()->getRepository(User::class)->find($id_user);

        $BoardFind = $this->getDoctrine()->getRepository(Board::class)->findBy(array('categorie'=>$categorie_id));
        return $this->render('board/AfficherBoardAvance.html.twig', [
            'listB' => $BoardFind,
            'list'=>$listcategorie,
            'user'=>$user,
            'path'=>$session->get('path'),'texte'=>$session->get('texte'),

        ]);
    }

    /**
     * @return Response
     * @Route("/AfficherBoardFavoris/{id_user}", name="AfficherBoardFavoris")
     */
    public function BoardFavoris($id_user,SessionInterface $session): Response
    {         if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }else if($session->get('user')->getId()!=$id_user){
        return $this->redirectToRoute('AfficherBoardFavoris',['id_user'=>$session->get('user')->getId()]);
    }
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();
        $user=$this->getDoctrine()->getRepository(User::class)->find($id_user);
        $listboard=$this->getDoctrine()->getRepository(Board::class)->findAll();

        return $this->render('board/AfficherBoardFavoris.html.twig', [
            'listB' => $listboard,
            'list'=>$listcategorie,
            'user'=>$user,
            'path'=>$session->get('path'),'texte'=>$session->get('texte'),

        ]);
    }
    /**
     * @return Response
     * @Route("/AfficherBoardAvanceForAdmin/{categorie_id}", name="AfficherBoardAvanceForAdmin")
     */
    public function BoardFindForAdmin($categorie_id,SessionInterface $session): Response
    {      if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');}
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();

        $BoardFind = $this->getDoctrine()->getRepository(Board::class)->findBy(array('categorie'=>$categorie_id));
        return $this->render('board/AfficherBoardAvanceForAdmin.html.twig', [
            'listB' => $BoardFind,
            'list'=>$listcategorie,

        ]);
    }

    /**
     * @Route("/AfficherBoardAdmin", name="listBA")
     */
    public function listAdmin(SessionInterface $session)
    {  if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');}
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();

        $listboard=$this->getDoctrine()->getRepository(Board::class)->findAll();


        return $this->render('board/AfficherBoardAdmin.html.twig', [
            'listB'=>$listboard,
            'list'=>$listcategorie,

        ]);
    }

    /**
     * @Route("/AjouterBoard", name="AjouterBoard")
     */
    public function AjouterBoard(Request $request,SessionInterface $session)
    {
        if(is_null($session->get('user'))){
            $this->redirectToRoute('user_inscription');
        }
        $user=$this->getDoctrine()->getRepository(User::class)->find($session->get('user')->getId());
        if(is_null($user->getSociete())||($user->getSociete()->getBoard())){
            $this->redirectToRoute('user_online');
        }

        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();

        $Board =new Board();
        $form= $this->createForm(BoardType::class,$Board);
        $form->add('ajouter',SubmitType::class,['label'=>'AjouterBoard']);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['Pic']->getData();
            if ($uploadedFile)
            {
                $destination = $this->getParameter('kernel.project_dir').'/public';
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $Board->setPic($newFilename);
            }
            $Board->setSociete($user->getSociete());
            $em=$this->getDoctrine()->getManager();
            $em->persist($Board);
            $em->flush();
            $user=$this->getDoctrine()->getRepository(User::class)->find($session->get('user')->getId());
            return $this->redirectToRoute("listB",['iduser'=>$user->getId()]);
        }
        return $this->render('board/AjouterBoard.html.twig', [
            'form' => $form->createView(),
            'list'=>$listcategorie,
            'user'=>$user,
            'path'=>$session->get('path'),'texte'=>$session->get('texte'),
        ]);

    }

    /**
     * @Route("/UpdateBoard/{id}", name="updateBoard")
     */
    public function update(Request $request,$id,SessionInterface $session)
    {   if(is_null($session->get('user'))){
        $this->redirectToRoute('user_inscription');
        }
        $listcategorie=$this->getDoctrine()->getRepository(CategorieBoard::class)->findAll();

        $em = $this->getDoctrine()->getmanager();
        $Board= $em->getRepository(Board::class)->find($id);
        $form = $this->createForm(BoardType::class,$Board);
        $form-> add('Update', SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['Pic']->getData();
            if ($uploadedFile)
            {
                $destination = $this->getParameter('kernel.project_dir').'/public';
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename.'-'.uniqid().'.'.$uploadedFile->guessExtension();
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $Board->setPic($newFilename);
            }
            $em->flush();
            return $this->redirectToRoute("listBA");
        }

        return $this->render('board/UpdateBoard.html.twig', [
            'form' => $form->createView(),            'list'=>$listcategorie,
        ]);


    }

    /**
     * @Route("/DeleteBoard/{id}", name="deleteBoard")
     */
    public function delete($id,SessionInterface $session)
    {    if(is_null($session->get('user'))){
        $this->redirectToRoute('user_inscription');
    }

        $em = $this->getDoctrine()->getmanager();
        $Board= $em->getRepository(Board::class)->find($id);
        $em->remove($Board);
        $em->flush();
        return $this->redirectToRoute('listBA');

    }

    /**
     * @Route("/rechercheBoard", name="rechercheBoard")
     */
    public function rechercheStudent(Request $request,SessionInterface $session)
    {    if(is_null($session->get('user'))){
        $this->redirectToRoute('user_inscription');
    }
        $data=$request->get('categorie');
        $Board=$this->getDoctrine()->getRepository(Board::class);
        $listStudent=$Board->findBy(['nsc'=>$data]);

        return $this->render('board/AfficherBoard.html.twig', [
            'list' =>$listStudent,
        ]);
    }


    /**
     * @Route("/mot", name="mot")
     */
    public function Ajoutermot($mot)
    {


    }
}
