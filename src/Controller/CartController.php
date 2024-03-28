<?php
namespace App\Controller;

use App\Repository\PlatRepository;
use App\Service\Cart\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartController extends AbstractController
{    
    private $logger;
    private $requestStack;
    private $cartService;
    private $platRepository;
    private $session;

    public function __construct(LoggerInterface $logger, PlatRepository $platRepository)
    {
        $this->logger = $logger;
        //$this->cartService = $cartService;
        // $this->requestStack = $requestStack;
    }

    #[Route("/panier", name: "cart_index")]
    #[Route("/panier", name: "cart_index")]
    public function index(SessionInterface $session, PlatRepository $platRepository)
    {
        $panier = $session->get("panier", []);
    
        $panierWithData = [];
    
        foreach ($panier as $id => $quantityArray) {
            $plat = $platRepository->find($id);
            if ($plat !== null) {
                $quantity = $quantityArray['quantity'];
                $panierWithData[] = [
                    'product' => $plat,
                    'quantity' => $quantity,
                ];
            }
        }
    
        //dd($panierWithData);

        $total = 0;

        foreach ($panierWithData as $item) {

            $totalItem = $item['product']->getPrix() * $item['quantity'];
            $total += $totalItem;   
        }

        //dd($panierWithData);
        return $this->render("cart/index.html.twig", [
            'items' => $panierWithData,
            'total' => $total
        ]);
    }


    // AJOUTER
    #[Route("/panier/add/{id}", name:"cart_add")]
    public function add($id, SessionInterface $session, PlatRepository $platRepository) {

        $panier = $session->get("panier", []);
        
        $plat = $platRepository->find($id);
    
        if (!$plat) {
            throw $this->createNotFoundException('Plat non trouvé');
        }
    
        if (!empty($panier[$id])) {
            $panier[$id]['quantity']++;
        } else {
            $panier[$id] = [
                'plat' => $plat,
                'quantity' => 1
            ];
        }
    
        $session->set('panier', $panier);

        //dd($session->get('panier'));

        return $this->redirectToRoute('cart_index', [
            'items' => $panier, // Passer les données du panier
        ]);
    } 

    // RETIRER
    #[Route('/panier/remove/{id}', name: 'cart_remove')]
    public function remove($id, PlatRepository $platRepository, SessionInterface $session) 
    {
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            if ($panier[$id]['quantity'] > 1) {
                $panier[$id]['quantity']--;
            } else {
                unset($panier[$id]);
            }
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute('cart_index');
    }

    // SUPPRIMER
    #[Route('/panier/delete/{id}', name:'cart_delete')]
    public function delete($id, SessionInterface $session, PlatRepository $platRepository) 
    {
        $panier = $session->get('panier', []);
    
        if (!empty($panier)) {
            unset($panier[$id]);
        }
    
        $session->set('panier', $panier);
    
        return $this->redirectToRoute('cart_index');
    }

    #[Route('/empty', name:'cart_empty')]
    public function empty(SessionInterface $session)
    {
        $session->remove('panier');

        return $this->redirectToRoute('cart_index');
    }

    
}
