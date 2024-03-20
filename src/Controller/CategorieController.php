<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategorieRepository;

class CategorieController extends AbstractController
{


    private $categorieRepository;
    private $platRepository;

    public function __construct(CategorieRepository $categorieRepository)
    {
        $this->categorieRepository = $categorieRepository;
    }

    #[Route('/categorie', name: 'app_categorie')]

    public function index(): Response
    {
        $categorie = $this -> categorieRepository -> findAll ();
        
        // Regarde pagination pour les autres pages du caroussel

        return $this->render('categorie/index.html.twig', 
        
            [
                'controller_name' => 'CategorieController',

                'categorie'=> $categorie,
            ]
        );
    }

}
