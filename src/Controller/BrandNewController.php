<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
class BrandNewController extends AbstractController
{
    /**
     * @Route("/brand/new", name="brand_new")
     */
    public function index(): Response
    {
        $response = $this->client->request(
            'GET',
            'https://geo.api.gouv.fr/departements/01/communes'
        );


        $content = $response->getContent();

        $cont = json_decode($content,true);
        foreach ($cont as $key => $value) {
            echo $key." =>";
            var_dump($value);
        }
        return $this->render('brand_new/index.html.twig', [
            'controller_name' => 'BrandNewController',
        ]);
    }

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
}
