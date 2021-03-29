<?php

namespace App\Controller;

use App\Form\ProduitServiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ProduitService;
use App\Entity\CategorieProduitService;
use Dompdf\Dompdf;
use Dompdf\Options;

class ProduitServiceController extends AbstractController
{
    /**
     * @Route("/produit/service", name="produit_service")
     */
    public function index(): Response
    {

        $ProduitService= $this->getDoctrine()->getManager()->getRepository(ProduitService::class)->findAll();

        return $this->render('produit_service/index.html.twig', [
            'ProduitService' => $ProduitService,

        ]);
    }


    /**
     * @Route("/produit/service/front", name="produit_service_front")
     */
    public function indexx(): Response
    {
        //$ProduitService= $this->getDoctrine()->getManager()->getRepository(ProduitService::class)->findAll();
        $ProduitService= $this->getDoctrine()->getRepository(ProduitService::class)->findProdCat();

        return $this->render('produit_service/index1.html.twig', [
            'ProduitService' => $ProduitService,
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
    public function addProduitAction(Request $request)
    {
        $produit = new ProduitService();
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