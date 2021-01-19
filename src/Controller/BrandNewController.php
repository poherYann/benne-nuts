<?php

namespace App\Controller;

use App\Entity\Commune;
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
            'https://geo.api.gouv.fr/departements/76/communes'
        );


        $content = $response->getContent();

        $cont = json_decode($content,true);

        $entityManager = $this->getDoctrine()->getManager();

        foreach ($cont as $key => $value) {
            echo '<pre>';
            echo $key." =>";
            var_dump($value);
            echo '</pre>';


            $commune = new Commune();
            $commune->setName($value["nom"]);
            $commune->setCode($value["code"]);
            $commune->setCodedepartement($value["codeDepartement"]);
            $commune->setCoderegion($value["codeRegion"]);
            $commune->setCodepostaux($value["codePostaux"][3][0]);

            $entityManager->persist($commune);
        }
// entité code postal > relation commune cp
        // boucle value code postaux / liaison


        $entityManager->flush();

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
