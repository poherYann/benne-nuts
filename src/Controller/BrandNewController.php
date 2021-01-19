<?php

namespace App\Controller;

use App\Entity\CodePostal;
use App\Entity\Codepostaux;
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

        $cont = json_decode($content, true);

        $entityManager = $this->getDoctrine()->getManager();

        foreach ($cont as $key => $value) {
//
            $commune = new Commune();
            $commune->setNom($value["nom"]);
            $commune->setCode($value["code"]);
            $commune->setCodedepartement($value["codeDepartement"]);
            $commune->setCoderegion($value["codeRegion"]);
            foreach ($value["codesPostaux"] as $cp) {
                $codePostal = new CodePostal();
                $codePostal->setCode($cp);
                $codePostal->setCommune($commune);
                $commune->addCodePostal($codePostal);
                $entityManager->persist($codePostal);
            };

            $entityManager->persist($commune);
        }

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
