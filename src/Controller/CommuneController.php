<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CommuneController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    /**
     * @Route("/commune", name="commune")
     */
    public function index(): Response
    {

        $response = $this->client->request(
            'GET',
            'https://geo.api.gouv.fr/departements/01/communes'
        );
        $content = $response->getContent();
        dump($content);
        return $this->render('commune/index.html.twig', [
            'controller_name' => 'CommuneController',
        ]);
    }
}
