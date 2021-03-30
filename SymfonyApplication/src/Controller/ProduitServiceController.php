<?php

namespace App\Controller;

use App\Form\ProduitServiceType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ProduitService;
use App\Entity\Board;
use App\Entity\CategorieProduitService;
use Dompdf\Dompdf;
use Dompdf\Options;

class ProduitServiceController extends AbstractController
{
    /**
     * @Route("/produit/service", name="produit_service")
     */
    public function index(SessionInterface $session): Response
    {
        if(is_null($session->get('user')->getSociete()->getBoard()->getId())){
            $this->redirectToRoute('user_inscription');
        }
        $boardid=$session->get('user')->getSociete()->getBoard()->getId();
        $ProduitService= $this->getDoctrine()->getManager()->getRepository(ProduitService::class)->findBy(['board'=>$boardid]);

        return $this->render('produit_service/index.html.twig', [
            'ProduitService' => $ProduitService,

        ]);
    }
    /**
     * @Route("/produit/service/tri/{champ}", name="tri_par", methods={"GET"})
     */
    public function tri($champ,SessionInterface $session): Response
    {   if(is_null($session->get('user')->getSociete()->getBoard()->getId())){
        $this->redirectToRoute('user_inscription');
    }
        $boardid=$session->get('user')->getSociete()->getBoard()->getId();
        $ProduitService= $this->getDoctrine()->getManager()->getRepository(ProduitService::class)->findBy(['board'=>$boardid],[$champ=>'desc']);

        $template = $this->render('produit_service/ajaxtable.html.twig',['ProduitService'=>$ProduitService])->getContent();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response->setData(['template' => $template ]);
    }

    /**
     * @Route("/produit/service/notri", name="no_tri", methods={"GET"})
     */
    public function notri(SessionInterface $session): Response
    {   if(is_null($session->get('user')->getSociete()->getBoard()->getId())){
        $this->redirectToRoute('user_inscription');
    }
        $boardid=$session->get('user')->getSociete()->getBoard()->getId();
        $ProduitService= $this->getDoctrine()->getManager()->getRepository(ProduitService::class)->findBy(['board'=>$boardid]);

        $template = $this->render('produit_service/ajaxtable.html.twig',['ProduitService'=>$ProduitService])->getContent();
        $response = new JsonResponse();
        $response->setStatusCode(200);
        return $response->setData(['template' => $template ]);
    }

    /**
     * @Route("/produit/service/front/{idboard}", name="produit_service_front")
     */
    public function indexx(Request $request,PaginatorInterface $paginator,$idboard,SessionInterface $session): Response
    {
        $donnees= $this->getDoctrine()->getRepository(ProduitService::class)->findProdCat($idboard);
        $ProduitService=$paginator->paginate($donnees,$request->query->getInt('page', 1),3);

        return $this->render('produit_service/index1.html.twig', [
            'ProduitService' => $ProduitService,
            'user'=>$session->get('user'),
            'texte'=>$session->get('texte'),
            'path'=>$session->get('path'),
            'idboard'=>$idboard

        ]);
    }



    /**
     * @Route("/produit/service/liste", name="produit_service_liste")
     */
    public function liste(): Response
    {
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        $ProduitService= $this->getDoctrine()->getManager()->getRepository(ProduitService::class)->findAll();



        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('produit_service/listep.html.twig', [
            'ProduitService' => $ProduitService,

        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
    }




    //Add produit
    /**
     * @Route("/produit/service/new", name="produit_service_add")
     */
    public function addProduitAction(Request $request,SessionInterface $session)
    {   if(is_null($session->get('user'))||$session->get('user')->getType()!="societe"){
        return $this->redirectToRoute('user_inscription');
        }
        $board=$this->getDoctrine()->getRepository(Board::class)->find($session->get('user')->getSociete()->getBoard()->getId());
        $produit = new ProduitService();
        $produit->setBoard($board);
        $form = $this->createForm(ProduitServiceType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $produit->getLienImage();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();


            try {
                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
                 }

                $em = $this->getDoctrine()->getManager();
                $produit->setLienImage($fileName);
                $em->persist($produit);
                $em->flush();

                return $this->redirect($this->generateUrl("produit_service"));
            }

            return $this->render('produit_service/addProduit.html.twig',
                array(
                    'Form' => $form->createView()
                ));
        }


    //Delete produit
    /**
     * @Route("/produit/service/delete/{id}", name="produit_service_delete")
     */
    public function deleteAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $produit = $em->getRepository(ProduitService::class)->find($id);
        if ($produit!==null)
        {
            $em->remove($produit);
            $em->flush();
        }
        else
        {
            throw new NotFoundHttpException("Le produit d'id".$id."n'existe pas");
        }

        return $this->redirectToRoute("produit_service");
    }

    //Update produit
    /**
     * @Route("/produit/service/update/{id}", name="produit_service_update")
     */
    public function updateAction(Request $request, $id)
    {
        $em= $this->getDoctrine()->getManager();
        $produit=$em->getRepository(ProduitService::class)->find($id);

        $editform = $this->createForm(ProduitServiceType::class, $produit);
        $editform->handleRequest($request);

        if ($editform->isSubmitted() && $editform->isValid())
        {
            $em->persist($produit);
            $em->flush();
            return $this->redirectToRoute("produit_service");
        }

        return $this->render('produit_service/updateProduit.html.twig',
            array(
                'editForm'=>$editform->createView()
            ));
    }


}