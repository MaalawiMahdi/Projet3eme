<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Aide;
use App\Entity\User;
use App\Entity\Note;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;



class NoteController extends AbstractController
{
    /**
     * @Route("/note", name="note")
     */
    public function index(): Response
    {
        return $this->render('note/index.html.twig', [
            'controller_name' => 'NoteController',
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     * @Route("/ajouternote/{id}/{iduser}/{valeur}",name="ajouternote", methods="GET")
     */
    public function ajouterNote(MailerInterface $mailer, Request $request,$iduser,$id,$valeur)
    {   $avis=$request->get('avis');
        $Aidefind = $this->getDoctrine()->getRepository(Aide::class)->find($id);
        $user=$this->getDoctrine()->getRepository(User::class)->find($iduser);
        $x = $this->getDoctrine()->getRepository(Note::class)->findOneBy(array('aide'=>$Aidefind,'user'=>$iduser));
        if (empty($x))
        {
            $Note = new Note();
            $Note->setValeur($valeur);
            $Note->setUser($user);
            $Note->setAide($Aidefind);
            $Note->setAvis($avis);
            $em = $this->getDoctrine()->getManager();
            $em->persist($Note);
            $em->flush();
            $email = (new Email())
                ->from('holidayhiatuspidev@gmail.com')
                ->to("{$user->getMail()}")
                ->subject('Holidays Hiatus!')
                ->text("Votre note pour {$Aidefind->getTitre()} a été attribué avec succée merci   ! ❤️")
                ->html("<h1>Votre note pour {$Aidefind->getTitre()} a été attribué avec succée merci   ! ❤ </h1>");
            $mailer->send($email);

        }
        else
            {
            if (!($valeur==0)) {
                $x->setValeur($valeur);
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $email = (new Email())
                    ->from('holidayhiatuspidev@gmail.com')
                    ->to("{$user->getMail()}")
                    ->subject('Holidays Hiatus!')
                    ->text("Votre note pour {$Aidefind->getTitre()} a été modifié avec succée merci   ! ❤️")
                    ->html("<h1>Votre note pour {$Aidefind->getTitre()} a été modifié avec succée merci   ! ❤ </h1>");
                $mailer->send($email);

            }

            if (!($avis==""))
                {
                $x->setAvis($avis);
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                }
            }
            return $this->redirectToRoute('Afficherdetailaidenote',['DetailAides' => $Aidefind,'iduser'=>$iduser,'id'=>$id]);


    }

}
