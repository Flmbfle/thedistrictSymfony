<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;

class PlatsController extends AbstractController
{

    private $categorieRepository;
    private $platRepository;

    public function __construct(CategorieRepository $categorieRepository, PlatRepository $platRepository)
    {
        $this->categorieRepository = $categorieRepository;
        $this->platRepository = $platRepository;
    }

    #[Route('/plats', name: 'app_plats')]

    public function index(): Response
    {
        $categories=$this->categorieRepository->findAll();
        $plats=$this->platRepository->findAll();

        return $this->render('plats/index.html.twig', 
        
            [
                'controller_name' => 'PlatsController',

                'categorie'=> $categories,

                'plat'=> $plats
            ]
        );
    }
}
