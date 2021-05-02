<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Aide;
use App\Entity\User;
use App\Entity\Note;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use \Twilio\Rest\Client;
use Symfony\Component\HttpFoundation\JsonResponse;



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
    public function ajouterNote(MailerInterface $mailer, Request $request,$iduser,$id,$valeur,Client $client,SessionInterface $session)
    {    if(is_null($session->get('user'))){
        return $this->redirectToRoute('user_inscription');
    }else if($session->get('user')->getId()!=$iduser){
        return $this->redirectToRoute('ajouternote',['iduser'=>$session->get('user')->getId() ,  'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);
    }
        $avis=$request->get('avis');
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

          /*  $client->messages->create(
            // the number you'd like to send the message to
                '+21658899610',
                [
                    // A Twilio phone number you purchased at twilio.com/console
                    'from' => '+14062045814',
                    // the body of the text message you'd like to send
                    'body' => "Votre note pour {$Aidefind->getTitre()} a été attribué avec succée merci   ! ❤️",
                ]
            );*/


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
                /*$client->messages->create(
                // the number you'd like to send the message to
                    '+21658899610',
                    [
                        // A Twilio phone number you purchased at twilio.com/console
                        'from' => '+14062045814',
                        // the body of the text message you'd like to send
                        'body' => "Votre note pour {$Aidefind->getTitre()} a été modifié avec succée merci   ! ❤  ",
                    ]
                );*/

            }

            if (!($avis==""))
                {
                $x->setAvis($avis);
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                }
            }
            return $this->redirectToRoute('Afficherdetailaidenote',['DetailAides' => $Aidefind,'iduser'=>$iduser,'id'=>$id,'path'=>$session->get('path'),'texte'=>$session->get('texte'),]);
    }
        /**
         * @param Request $request
         * @return mixed
         * @Route("Api/Note/Ajouter/{id}/{iduser}/{valeur}/{avis}",name="ajouternoteJson")
         */
        public function ajouterNoteJson($avis,$iduser,$id,$valeur, Client $client,MailerInterface $mailer)
    {   if($avis=="null"){$avis="";}

        $Aidesfind = $this->getDoctrine()->getRepository(Aide::class)->find($id);
        $user=$this->getDoctrine()->getRepository(User::class)->find($iduser);
        $x = $this->getDoctrine()->getRepository(Note::class)->findOneBy(array('aide'=>$Aidesfind,'user'=>$iduser));
        //ajouter note /avis
        if (empty($x))
        {$Note = new Note();

            $Note->setValeur($valeur);
            $Note->setUser($user);
            $Note->setAide($Aidesfind);
            $Note->setAvis($avis);
            $em = $this->getDoctrine()->getManager();
            $em->persist($Note);
            $em->flush();

            $email = (new Email())
                ->from('holidayhiatuspidev@gmail.com')
                ->to("{$user->getMail()}")
                ->subject('Holidays Hiatus!')
                ->text("Votre note pour {$Aidesfind->getTitre()} a été attribué avec succée merci   ! ❤️")
                ->html("<h1>Votre note pour {$Aidesfind->getTitre()} a été attribué avec succée merci   ! ❤ </h1>");
            $mailer->send($email);

            /*  $client->messages->create(
              // the number you'd like to send the message to
                  '+21624602806',
                  [
                      // A Twilio phone number you purchased at twilio.com/console
                      'from' => '+12402610130',
                      // the body of the text message you'd like to send
                      'body' => "Votre note pour {$SoinMPsfind->getTitreSoinMP()} a été attribuée avec succée merci   ! ❤️",
                  ]
              );*/
            return new JsonResponse("note ajoutee");
        }
        // modifer note /avis
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
                    ->text("Votre note pour {$Aidesfind->getTitre()} a été modifié avec succée merci   ! ❤️")
                    ->html("<h1>Votre note pour {$Aidesfind->getTitre()} a été modifié avec succée merci   ! ❤ </h1>");
                $mailer->send($email);


                /*   $client->messages->create(
                   // the number you'd like to send the message to
                       '+21624602806',
                       [
                           // A Twilio phone number you purchased at twilio.com/console
                           'from' => '+12402610130',
                           // the body of the text message you'd like to send
                           'body' => "Votre note pour {$SoinMPsfind->getTitreSoinMP()} a été modifiée avec succée merci   ! ❤️",
                       ]
                   );*/
            }

            if (!($avis==""))
            {
                $x->setAvis($avis);
                $em = $this->getDoctrine()->getManager();
                $em->flush();
            }
            return new JsonResponse("note modifiee");

        }


    }





}
