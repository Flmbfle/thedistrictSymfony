<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class CatalogueController extends AbstractController
{

    private $categorieRepository;
    private $platRepository;

    public function __construct(CategorieRepository $categorieRepository, PlatRepository $platRepository)
    {
        $this->categorieRepository = $categorieRepository;
        $this->platRepository = $platRepository;
    }

    #[Route("/", name: "app_catalogue")]

    public function index(): Response
    {
        $categorie = $this -> categorieRepository -> findBy ( ['active' => 1], null , 6);
        $plat = $this -> platRepository -> findBy ( ['active'=> 1], /*['quantité' => 'ASC']*/ null, 3);
        
        return $this->render('catalogue/index.html.twig', 
        
            [
                'controller_name' => 'CatalogueController',

                'categorie'=> $categorie,

                'plat'=> $plat,
            ]
            
        );
    }

    
    #[Route("/plats", name: "app_plats")]
    public function ViewPlats(): Response
    {
        $categories=$this->categorieRepository->findAll();
        $plat=$this->platRepository->findAll();

        return $this->render('catalogue/plats.html.twig', 
        
            [
                'controller_name' => 'PlatsController',

                'categorie'=> $categories,

                'plat'=> $plat
            ]
        );
    }

    #[Route("/categories", name: "app_categories")]
    public function ViewCategorie(): Response
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

    #[Route("/plats/{categorie_id}", name: "app_platscat")]
    public function viewPlatCat($categorie_id): Response
    {
        // Récupérer les détails de la catégorie avec l'ID $categorie_id
        $categorie = $this->categorieRepository->find($categorie_id);
        
        // Récupérer les plats de cette catégorie
        $plats = $categorie->getPlats();
    
        // Passer les plats au template pour les afficher
        return $this->render('catalogue/platscat/platscat.html.twig', [
            'categorie' => $categorie,
            'plats' => $plats,
        ]);
    }

}