<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccueilController extends AbstractController
{

    private $categorieRepository;
    private $platRepository;

    public function __construct(CategorieRepository $categorieRepository, PlatRepository $platRepository)
    {
        $this->categorieRepository = $categorieRepository;
        $this->platRepository = $platRepository;
    }

    #[Route('/accueil', name: 'app_accueil')]

    public function index(): Response
    {
        $categorie = $this -> categorieRepository -> findBy ( ['active' => 1], null , 6);
        $plat = $this -> platRepository -> findBy ( ['active'=> 1], /*['quantité' => 'ASC']*/ null, 3);

        return $this->render('accueil/index.html.twig', 
        
            [
                'controller_name' => 'AccueilController',

                'categorie'=> $categorie,

                'plat'=> $plat
            ]
        );
    }
}
