<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatalogueController extends AbstractController
{

    private $categorieRepository;
    private $platRepository;

    public function __construct(CategorieRepository $categorieRepository, PlatRepository $platRepository)
    {
        $this->categorieRepository = $categorieRepository;
        $this->platRepository = $platRepository;
    }

    #[Route('/', name: 'app_catalogue')]

    public function index(): Response
    {
        $categorie = $this -> categorieRepository -> findBy ( ['active' => 1], null , 6);
        $plat = $this -> platRepository -> findBy ( ['active'=> 1], /*['quantité' => 'ASC']*/ null, 3);

        return $this->render('catalogue/index.html.twig', 
        
            [
                'controller_name' => 'CatalogueController',

                'categorie'=> $categorie,

                'plat'=> $plat
            ]
        );
    }

    #[Route('/plats', name: 'app_plats')]
    public function ViewPlats(): Response
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

    #[Route('/plats/{categorie_id}', name: 'app_platscat')]
    public function viewPlatCat($categorie_id): Response
    {
        // Ici, vous pouvez ajouter votre logique pour récupérer les détails de la catégorie avec l'ID $categorie_id

        // Par exemple, vous pouvez utiliser $categorie_id pour rechercher les plats de cette catégorie dans la base de données
        
        return $this->render('catalogue/platscat/' . $categorie_id . '.html.twig', [
            'categorie_id' => $categorie_id,
        ]);
    }

    #[Route('/categories', name: 'app_categories')]
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

}