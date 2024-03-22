<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use App\Repository\DetailRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;


class CartController extends AbstractController
{    
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        // Utilisez le service personnalisé si vous l'avez défini
        $this->logger = $logger;
    }

    #[Route("/panier", name: "cart_index")]
    public function index()
    {
        return $this->render("cart/index.html.twig");
    }

    #[Route("/panier/add/{id}", name:"cart_add")]
    public function add($id, Request $request, PlatRepository $platRepository) {
        $session = $request->getSession();
        $panier = $session->get("panier", []);
        $plat = $platRepository->find($id);
    
        if (!$plat) {
            throw $this->createNotFoundException('Plat non trouvé');
        }
    
        //$this->logger->critical('Les 2 !!! AAAA test $plat : '. print_r($plat)); // pas bien

   
        //$this->logger->critical('Les 2 !!! AAAA test $plat : ');
        // var_dump($plat);

        //$categorieId = null;
        //$this->logger->critical('Les 2 !!! A $categorieId : '. $categorieId);
        $categorie = $plat->getCategorie();
        //$this->logger->critical('Les 2 !!! B $categorie : '. $categorie->getId());
        if ($categorie !== null) {
            $categorieId = $categorie->getId();
    
        }
    
        if (!empty($panier[$id])) {
            $panier[$id]['quantity']++;
        } else {
            $panier[$id] = [
                'plat' => $plat,
                'categorie_id' => $categorieId, // Définition de l'ID de la catégorie dans le panier
                'quantity' => 1
            ];
        }
    
        $session->set('panier', $panier);
    
        dd($session->get('panier'));
    } 

}
