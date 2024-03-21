<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use App\Repository\DetailRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;


class CartController extends AbstractController
{
    
    #[Route("/panier", name: "cart_index")]
    public function index()
    {
        return $this->render("cart/panier.html.twig");
    }

    #[Route("/panier/add/{id}", name:"cart_add")]
    public function add($id, Request $request) {

        $session = $request->getSession();
        
        $panier = $session->get("panier", []);
        

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        $panier[$id] = 1;

        $session->set('panier', $panier);

        dd($session->get('panier '));
    }

}
