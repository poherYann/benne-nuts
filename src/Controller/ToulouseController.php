<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToulouseController extends AbstractController
{
    /**
     * @Route("/toulouse", name="toulouse")
     */
    public function index(): Response
    {
        return $this->render('toulouse/index.html.twig', [
            'controller_name' => 'ToulouseController',
        ]);
    }
}
