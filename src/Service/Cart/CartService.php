<?php

namespace App\Service\Cart;

use App\Repository\PlatRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

// class CartService
// {
//     private $requestStack;

//     public function __construct(RequestStack $requestStack)
//     {
//         $this->requestStack = $requestStack;
//     }

//     public function addToCart($id)
//     {
//         $request = $this->requestStack->getCurrentRequest();
//         $session = $request->getSession();

//         // Récupérer le panier actuel depuis la session ou initialiser un nouveau panier s'il n'existe pas
//         $panier = $session->get('panier', []);

//         // Vérifier si l'article est déjà dans le panier
//         if (array_key_exists($id, $panier)) {
//             // Si l'article existe déjà, augmenter la quantité
//             $panier[$id]++;
//         } else {
//             // Sinon, ajouter l'article au panier avec une quantité de 1
//             $panier[$id] = 1;
//         }

//         // Mettre à jour le panier dans la session
//         $session->set('panier', $panier);
//     }
// }




//     public function delete (int $id) {}

//     public function remove (int $id) {}

//     // public function getFullCart() : array {}

//     // public function getTotal () : float {}
// }