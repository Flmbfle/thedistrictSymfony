<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use App\Entity\Categorie;
use app\Entity\Detail;
use App\Entity\Commande;
use App\Entity\Plat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

    # ================================================================================ #
     #                                   CATEGORIE                                    #
    # ================================================================================ #

        $categorie1 = new Categorie ();

        $categorie1 -> setLibelle ("Boisson Chaudes");
        $categorie1 -> setImage ("boisson_chaudes_cat.jpg");
        $categorie1 -> setActive (1);

        $manager -> persist ($categorie1);
        $manager -> flush ();


        $categorie2 = new Categorie ();

        $categorie2 -> setLibelle ("Pâtisserie");
        $categorie2 -> setImage ("patisserie_cat.jpg");
        $categorie2 -> setActive (1);

        $manager -> persist ($categorie2);
        $manager -> flush ();


        $categorie3 = new Categorie ();

        $categorie3 -> setLibelle ("Boissons Froides");
        $categorie3 -> setImage ("boisson_froides_cat.jpg");
        $categorie3 -> setActive (1);

        $manager -> persist ($categorie3);
        $manager -> flush ();


    # ================================================================================ #
     #                                     PLAT                                       #
    # ================================================================================ #

        $plat1 = new Plat();

        $plat1 -> setCategorie ($categorie1);
        $plat1 -> setLibelle("Café Noir");
        $plat1 -> setDescription ("Un breuvage sombre et réconfortant, offrant une explosion de saveurs intenses et un arôme enivrant, idéal pour éveiller les sens à chaque gorgée.");
        $plat1 -> setPrix(2);
        $plat1 -> setImage ("cafe.jpg");
        $plat1 -> setActive (1);

        $manager -> persist ($plat1);
        $manager -> flush ();


        $plat2 = new Plat();

        $plat2 -> setCategorie ($categorie2);
        $plat2 -> setLibelle ("Cookie");
        $plat2 -> setDescription ("Une douceur croustillante à l'extérieur, moelleuse à l'intérieur, infusée de pépites de chocolat fondantes, offrant une symphonie de textures et de saveurs réconfortantes.");
        $plat2 -> setPrix(2.5);
        $plat2 -> setImage ("cookies.jpg");
        $plat2 -> setActive (1);

        $manager -> persist ($plat2);   
        $manager -> flush ();   


        $plat3 = new Plat();

        $plat3 -> setCategorie ($categorie3);
        $plat3 -> setLibelle ("Ice Tea");
        $plat3 -> setDescription ("Rafraîchissant et désaltérant, cet élixir glacé allie la fraîcheur du thé infusé aux notes subtiles de citron, offrant une expérience rafraîchissante inégalée.");
        $plat3 -> setPrix (1.5);
        $plat3 -> setImage ("ice-tea.jpg");
        $plat3 -> setActive (1);

        $manager -> persist ($plat3);
        $manager -> flush ();


        $plat4 = new Plat();

        $plat4 -> setCategorie ($categorie2);
        $plat4 -> setLibelle ("Muffin Chocolat");
        $plat4 -> setDescription ("Un délice moelleux, riche en chocolat, avec des pépites fondantes à chaque bouchée, mariant harmonieusement la douceur et l'intensité pour une expérience gourmande inoubliable.");
        $plat4 -> setPrix (2.5);
        $plat4 -> setImage ("muffin.jpg");
        $plat4 -> setActive (1);

        $manager -> persist ($plat4);
        $manager -> flush ();


        $plat5 = new Plat();

        $plat5 -> setCategorie ($categorie3);
        $plat5 -> setLibelle ("Coca-Cola");
        $plat5 -> setDescription ("Une boisson pétillante et rafraîchissante, symbole de convivialité, offrant une explosion de saveurs sucrées et acidulées qui éveillent les papilles à chaque gorgée.");
        $plat5 -> setImage ("coca.jpg");
        $plat5 -> setPrix (1.5);
        $plat5 -> setActive (1);
                
        $manager -> persist ($plat5);
        $manager -> flush ();

    
    # ================================================================================ #
     #                                   UTILISATEUR                                  #
    # ================================================================================ #

        $utilisateur1 = new Utilisateur();
        $utilisateur1 -> setEmail("hedley@gmail.com");
        $utilisateur1 -> setRoles(["ROLE_USER"]);
        $utilisateur1 -> setPassword("mdp");
        $utilisateur1 -> setNom("Hedley");
        $utilisateur1 -> setPrenom("Claudia");
        $utilisateur1 -> setTelephone("0651114400");
        $utilisateur1 -> setAdresse("30 rue de Poulainville");
        $utilisateur1 -> setCp("80000");
        $utilisateur1 -> setVille("Amiens");

        $manager -> persist( $utilisateur1 );
        $manager -> flush ();

        $utilisateur2 = new Utilisateur();
        $utilisateur2 -> setEmail("venno@gmail.com");
        $utilisateur2 -> setRoles(["ROLE_USER"]);
        $utilisateur2 -> setPassword("mdp");
        $utilisateur2 -> setNom("Vargas");
        $utilisateur2 -> setPrenom("Vernon");
        $utilisateur2 -> setTelephone("0614744440");
        $utilisateur2 -> setAdresse("330 Avenue du Général Leclercq");
        $utilisateur2 -> setCp("80000");
        $utilisateur2 -> setVille("Amiens");

        $manager -> persist( $utilisateur2 );
        $manager -> flush ();

        $utilisateur3 = new Utilisateur();
        $utilisateur3 -> setEmail("erwabtot@gmail.com");
        $utilisateur3 -> setRoles(["ROLE_SUPER_ADMNIN"]);
        $utilisateur3 -> setPassword("");
        $utilisateur3 -> setNom("Totet");
        $utilisateur3 -> setPrenom("Erwan");
        $utilisateur3 -> setTelephone("0635194831");
        $utilisateur3 -> setAdresse("3 Bis rue de Nesle appt 1");
        $utilisateur3 -> setCp("80190");
        $utilisateur3 -> setVille("Mesnil-Saint-Nicaise");

        
    # ================================================================================ #
     #                                    COMMANDE                                    #
    # ================================================================================ #

        $commande1 = new Commande();
        $dateCommande1 = \DateTime::createFromFormat("Y-m-d H:i:s", "2024-03-15 09:38:45");
        $commande1 -> setDateCommande($dateCommande1);
        $commande1 -> setTotal(0);
        $commande1 -> setEtat("0");
        $commande1 -> setUtilisateur($utilisateur1);
        $manager -> persist( $commande1 );
        $manager -> flush ();   

        $commande2 = new Commande();
        $dateCommande2 = \DateTime::createFromFormat("Y-m-d H:i:s", "2024-03-15 09:40:22");
        $commande2 -> setDateCommande($dateCommande2);
        $commande2 -> setTotal(0);
        $commande2 -> setEtat("2");
        $commande2 -> setUtilisateur($utilisateur2);
        $manager -> persist( $commande2 );
        $manager -> flush ();   

        $commande3 = new Commande();
        $dateCommande3 = \DateTime::createFromFormat("Y-m-d H:i:s", "2024-03-15 09:42:16");
        $commande3 -> setDateCommande($dateCommande3);
        $commande3 -> setTotal(0);
        $commande3 -> setEtat("3");
        $commande3 -> setUtilisateur($utilisateur2);
        $manager -> persist( $commande3 );
        $manager -> flush ();   

    }
}
