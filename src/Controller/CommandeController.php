<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Detail;
use App\Repository\PlatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;
use DateTimeImmutable;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CommandeType;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'commande')]
    public function commande(Request $request): Response
    {
        $form = $this->createForm(CommandeType::class);

        return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
            'commandeForm' => $form,
        ]);
    }
  
    #[Route('/ajout', name: 'add_commande')]
    public function add(SessionInterface $session, PlatRepository $platRepository, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        
        $panier = $session->get('panier', []);

        if ($panier === []) 
        {
            $this->addFlash('message','Votre panier est vide !');
            return $this->redirectToRoute('app_catalogue');
        }

        //Le panier n'est pas vide on crée la commande
        $commande = new Commande(); 

        // On rempli la commande 
        $commande->setUtilisateur($this->getUser());

        
        $total = 0;

        //On parcour le panier pour crée les détails de commande 
        foreach ($panier as $item => $quantity) 
        {
            $detail = new Detail();

            // On va chercher le produit 
            $plat = $platRepository->find($item);

            // On crée le detail de commande
            $detail->setPlat($plat);

            // On récupère la quantité depuis le panier
            $quantity = $panier[$item]['quantity'];
            $detail->setQuantite($quantity);

            // Calcul du sous-total pour ce détail de commande
            $total = $plat->getPrix() * $quantity;
            
            $commande->addDetail($detail);
        }
        // Assignation du total à la commande
        $commande->setTotal($total);

         // Assignation de la date de commande
        $dateCommande = new DateTimeImmutable();
        $commande->setDateCommande($dateCommande);

    
        // Assignation de l'état de la commande
        // Ici, je vais supposer que l'état initial est 0 (enregistrée/payée)
        $commande->setEtat(0);

        // On persiste et on flush
        $em->persist($commande);
        $em->flush();

        $session->remove('panier');

        //dd($panier);
        $this->addFlash('message','Commande validé avec succès !');
        return $this->render('catalogue/index.html.twig');
    }



}
