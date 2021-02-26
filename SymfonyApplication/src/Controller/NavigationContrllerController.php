<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavigationContrllerController extends AbstractController
{
    /**
     * @Route("/HolidayHiatus", name="welcome")
     */
    public function index(): Response
    {
        return $this->render('navigation_contrller/index.html.twig', [
            'controller_name' => 'NavigationContrllerController',
        ]);
    }

}
