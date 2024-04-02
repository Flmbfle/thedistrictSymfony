<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Repository\CategorieRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SearchFormType;

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
    public function index(Request $request, PlatRepository $plats): Response
    {
        $form = $this->createForm(SearchFormType::class);
        $form->handleRequest($request);

        // Initialiser $plat avec une valeur par défaut
        $plat = [];

        // Vérifier si le formulaire a été soumis et est valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données du formulaire
            $data = $form->getData();
            
            // Vérifier si la clé 'query' est définie dans les données du formulaire
            if (isset($data['query'])) {
                // Récupérer la valeur du champ 'query' du formulaire
                $query = $data['query'];

                // Rechercher les plats correspondant à la recherche
                $plat = $plats->findByLibelle($query);
            }
        } else {
            // Traitement par défaut si le formulaire n'est pas soumis ou invalide
            $plat = $plats->findAll();
        }

        // Récupérer les catégories actives
        $categories = $this->categorieRepository->findBy(['active' => true], null, 6);

        // Récupérer les plats actifs
        $plats = $plats->findBy(['active' => true], null, 3);
        
        return $this->render('catalogue/index.html.twig', [
            'controller_name' => 'CatalogueController',
            'categories' => $categories,
            'plats' => $plats,
            'searchForm' => $form->createView(),
        ]);
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

        return $this->render('catalogue/categories.html.twig', 
        
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


    // // Barre de rehcerche 
    // public function search(Request $request , PlatRepository $plats): Response
    // {
    //     $form = $this->createForm(SearchFormType::class);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $query = $form->getData()['query'];
    //         $plat = $this->$plats->findByLibelle($query);
    //     } else {
    //     // Traitement par défaut si le formulaire n'est pas soumis ou invalide
    //     $plat = $plats->findAll(); // Correction ici
    //     }

    //     return $this->render('catalogue/index.html.twig', [
    //         'searchForm' => $form->createView(),
    //         'plat' => $plat,
    //     ]);
    // }

}